<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Function: menghitung nilai investasi dengan bunga majemuk
        DB::unprepared('
            CREATE FUNCTION compound_value(
                principal DECIMAL(15,2),
                rate_percent DECIMAL(5,2),
                years DECIMAL(10,2)
            ) RETURNS DECIMAL(15,2)
            DETERMINISTIC
            BEGIN
                RETURN principal * POW(1 + rate_percent / 100, years);
            END
        ');

        // Procedure: ringkasan budget vs pengeluaran per kategori dalam satu bulan
        DB::unprepared('
            CREATE PROCEDURE monthly_summary(
                IN p_user_id BIGINT,
                IN p_year INT,
                IN p_month INT
            )
            BEGIN
                SELECT
                    b.category,
                    b.amount AS budget,
                    COALESCE(SUM(t.amount), 0) AS spent,
                    b.amount - COALESCE(SUM(t.amount), 0) AS remaining
                FROM budgets b
                LEFT JOIN transactions t
                    ON t.user_id = b.user_id
                    AND t.category = b.category
                    AND t.type = "expense"
                    AND YEAR(t.transaction_date) = p_year
                    AND MONTH(t.transaction_date) = p_month
                WHERE b.user_id = p_user_id
                    AND b.year = p_year
                    AND b.month = p_month
                GROUP BY b.category, b.amount;
            END
        ');

        // Trigger 1: setelah subtask ditambah, hitung ulang progress task
        DB::unprepared('
            CREATE TRIGGER subtasks_after_insert
            AFTER INSERT ON subtasks
            FOR EACH ROW
            BEGIN
                UPDATE tasks SET progress = (
                    SELECT ROUND(COALESCE(SUM(is_done) / COUNT(*) * 100, 0))
                    FROM subtasks WHERE task_id = NEW.task_id
                ) WHERE id = NEW.task_id;
            END
        ');

        // Trigger 2: setelah subtask diubah (is_done dicentang/uncentang), hitung ulang progress
        DB::unprepared('
            CREATE TRIGGER subtasks_after_update
            AFTER UPDATE ON subtasks
            FOR EACH ROW
            BEGIN
                UPDATE tasks SET progress = (
                    SELECT ROUND(COALESCE(SUM(is_done) / COUNT(*) * 100, 0))
                    FROM subtasks WHERE task_id = NEW.task_id
                ) WHERE id = NEW.task_id;
            END
        ');

        // Trigger 3: setelah subtask dihapus, hitung ulang progress (atau set 0 jika subtask habis)
        DB::unprepared('
            CREATE TRIGGER subtasks_after_delete
            AFTER DELETE ON subtasks
            FOR EACH ROW
            BEGIN
                UPDATE tasks SET progress = (
                    SELECT ROUND(COALESCE(SUM(is_done) / COUNT(*) * 100, 0))
                    FROM subtasks WHERE task_id = OLD.task_id
                ) WHERE id = OLD.task_id;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS subtasks_after_delete');
        DB::unprepared('DROP TRIGGER IF EXISTS subtasks_after_update');
        DB::unprepared('DROP TRIGGER IF EXISTS subtasks_after_insert');
        DB::unprepared('DROP PROCEDURE IF EXISTS monthly_summary');
        DB::unprepared('DROP FUNCTION IF EXISTS compound_value');
    }
};
