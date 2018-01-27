<?php

use App\Models\School;
use Illuminate\Database\Seeder;
use App\Models\Settings\Accounts\GeneralLedgerAccounts;

class GLASeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (School::all() as $school) {
            // Assets
            $current_assets = new GeneralLedgerAccounts();
            $current_assets->name = 'Current Assets';
            $current_assets->parent_identifier = 'A';
            $current_assets->slug = slugify($current_assets->name);
            $current_assets->parent_id = 0;
            $current_assets->identifier = 'A1';
            $current_assets->real_depth = 1;
            $current_assets->balance = 0;
            $current_assets->school_id = $school->id;
            $current_assets->is_deletable = false;
            $current_assets->save();

            $cash_at_hand = new GeneralLedgerAccounts();
            $cash_at_hand->name = 'Cash At Hand';
            $cash_at_hand->slug = slugify($cash_at_hand->name);
            $cash_at_hand->parent_identifier = 'A';
            $cash_at_hand->parent_id = $current_assets->id;
            $cash_at_hand->identifier = 'A11';
            $cash_at_hand->real_depth = 2;
            $cash_at_hand->balance = 0;
            $cash_at_hand->school_id = $school->id;
            $cash_at_hand->is_deletable = false;
            $cash_at_hand->save();

            $bursar_cash_account = new GeneralLedgerAccounts();
            $bursar_cash_account->name = 'Bursar Cash Account';
            $bursar_cash_account->slug = slugify($bursar_cash_account->name);
            $bursar_cash_account->parent_identifier = 'A';
            $bursar_cash_account->parent_id = $cash_at_hand->id;
            $bursar_cash_account->identifier = 'A111';
            $bursar_cash_account->real_depth = 3;
            $bursar_cash_account->balance = 500000;
            $bursar_cash_account->school_id = $school->id;
            $bursar_cash_account->is_deletable = false;
            $bursar_cash_account->save();

            $cash_at_bank = new GeneralLedgerAccounts();
            $cash_at_bank->name = 'Cash At Bank';
            $cash_at_bank->slug = slugify($cash_at_bank->name);
            $cash_at_bank->parent_identifier = 'A';
            $cash_at_bank->parent_id = $current_assets->id;
            $cash_at_bank->identifier = 'A12';
            $cash_at_bank->real_depth = 2;
            $cash_at_bank->balance = 0;
            $cash_at_bank->school_id = $school->id;
            $cash_at_bank->is_deletable = false;
            $cash_at_bank->save();

            $cash_advance_to_staffs = new GeneralLedgerAccounts();
            $cash_advance_to_staffs->name = 'Cash Advances';
            $cash_advance_to_staffs->slug = slugify($cash_advance_to_staffs->name);
            $cash_advance_to_staffs->parent_identifier = 'A';
            $cash_advance_to_staffs->parent_id = $current_assets->id;
            $cash_advance_to_staffs->identifier = 'A13';
            $cash_advance_to_staffs->real_depth = 2;
            $cash_advance_to_staffs->balance = 0;
            $cash_advance_to_staffs->school_id = $school->id;
            $cash_advance_to_staffs->is_deletable = false;
            $cash_advance_to_staffs->save();

            $non_current_assets = new GeneralLedgerAccounts();
            $non_current_assets->name = 'Non Current Assets';
            $non_current_assets->slug = slugify($non_current_assets->name);
            $non_current_assets->parent_identifier = 'A';
            $non_current_assets->parent_id = 0;
            $non_current_assets->identifier = 'A2';
            $non_current_assets->real_depth = 1;
            $non_current_assets->balance = 0;
            $non_current_assets->school_id = $school->id;
            $non_current_assets->is_deletable = false;
            $non_current_assets->save();

            $property_land_and_equity = new GeneralLedgerAccounts();
            $property_land_and_equity->name = 'Propert Land and Equity';
            $property_land_and_equity->slug = slugify($property_land_and_equity->name);
            $property_land_and_equity->parent_identifier = 'A';
            $property_land_and_equity->parent_id = $non_current_assets->id;
            $property_land_and_equity->identifier = 'A21';
            $property_land_and_equity->real_depth = 2;
            $property_land_and_equity->balance = 0;
            $property_land_and_equity->school_id = $school->id;
            $property_land_and_equity->is_deletable = false;
            $property_land_and_equity->save();

            // Equity
            $fees_collection = new GeneralLedgerAccounts();
            $fees_collection->name = 'Fees Collection Account';
            $fees_collection->slug = slugify($fees_collection->name);
            $fees_collection->parent_identifier = 'E';
            $fees_collection->parent_id = 0;
            $fees_collection->identifier = 'E1';
            $fees_collection->real_depth = '1';
            $fees_collection->balance = 0;
            $fees_collection->school_id = $school->id;
            $fees_collection->is_deletable = false;
            $fees_collection->save();

            $commissions = new GeneralLedgerAccounts();
            $commissions->name = 'Commissions';
            $commissions->slug = slugify($commissions->name);
            $commissions->parent_identifier = 'E';
            $commissions->parent_id = 0;
            $commissions->identifier = 'E2';
            $commissions->real_depth = 1;
            $commissions->balance = 0;
            $commissions->school_id = $school->id;
            $commissions->is_deletable = false;
            $commissions->save();

            // Liabilities
            $current_liabilities = new GeneralLedgerAccounts();
            $current_liabilities->name = 'Current Liabilities';
            $current_liabilities->slug = slugify($current_liabilities->name);
            $current_liabilities->parent_identifier = 'L';
            $current_liabilities->parent_id = 0;
            $current_liabilities->identifier = 'L1';
            $current_liabilities->real_depth = 1;
            $current_liabilities->balance = 0;
            $current_liabilities->school_id = $school->id;
            $current_liabilities->is_deletable = false;
            $current_liabilities->save();

            $salaries = new GeneralLedgerAccounts();
            $salaries->name = 'Salaries';
            $salaries->slug = slugify($salaries->name);
            $salaries->parent_identifier = 'L';
            $salaries->parent_id = $current_liabilities->id;
            $salaries->identifier = 'L11';
            $salaries->real_depth = 2;
            $salaries->balance = 0;
            $salaries->school_id = $school->id;
            $salaries->is_deletable = false;
            $salaries->save();

            $teachers_salary = new GeneralLedgerAccounts();
            $teachers_salary->name = 'Teachers Salary';
            $teachers_salary->slug = slugify($teachers_salary->name);
            $teachers_salary->parent_identifier = 'L';
            $teachers_salary->parent_id = $salaries->id;
            $teachers_salary->identifier = 'L111';
            $teachers_salary->real_depth = 3;
            $teachers_salary->balance = 0;
            $teachers_salary->school_id = $school->id;
            $teachers_salary->is_deletable = false;
            $teachers_salary->save();

            $support_staffs_salary = new GeneralLedgerAccounts();
            $support_staffs_salary->name = 'Support Staffs Salary';
            $support_staffs_salary->slug = slugify($support_staffs_salary->name);
            $support_staffs_salary->parent_identifier = 'L';
            $support_staffs_salary->parent_id = $salaries->id;
            $support_staffs_salary->identifier = 'L112';
            $support_staffs_salary->real_depth = 3;
            $support_staffs_salary->balance = 0;
            $support_staffs_salary->school_id = $school->id;
            $support_staffs_salary->is_deletable = false;
            $support_staffs_salary->save();

            $payables = new GeneralLedgerAccounts();
            $payables->name = 'Payables';
            $payables->slug = slugify($payables->name);
            $payables->parent_identifier = 'L';
            $payables->parent_id = 0;
            $payables->identifier = 'L12';
            $payables->real_depth = 2;
            $payables->balance = 0;
            $payables->school_id = $school->id;
            $payables->is_deletable = false;
            $payables->save();

            $nssf  = new GeneralLedgerAccounts();
            $nssf->name = 'NSSF';
            $nssf->slug = slugify($nssf->name);
            $nssf->parent_identifier = 'L';
            $nssf->parent_id = $payables->id;
            $nssf->identifier = 'L121';
            $nssf->real_depth = 3;
            $nssf->balance = 0;
            $nssf->school_id = $school->id;
            $nssf->is_deletable = false;
            $nssf->save();

            $paye_tax = new GeneralLedgerAccounts();
            $paye_tax->name = 'PAYE Tax';
            $paye_tax->slug = slugify($paye_tax->name);
            $paye_tax->parent_identifier = 'L';
            $paye_tax->parent_id = $payables->id;
            $paye_tax->identifier = 'L122';
            $paye_tax->real_depth = 3;
            $paye_tax->balance = 0;
            $paye_tax->school_id = $school->id;
            $paye_tax->is_deletable = false;
            $paye_tax->save();

            $equity_tax = new GeneralLedgerAccounts();
            $equity_tax->name = 'Equity Tax';
            $equity_tax->slug = slugify($equity_tax->name);
            $equity_tax->parent_identifier = 'L';
            $equity_tax->parent_id = $payables->id;
            $equity_tax->identifier = 'L123';
            $equity_tax->real_depth = 3;
            $equity_tax->balance = 0;
            $equity_tax->school_id = $school->id;
            $equity_tax->is_deletable = false;
            $equity_tax->save();

            $withholding_tax = new GeneralLedgerAccounts();
            $withholding_tax->name = 'Witholding Tax';
            $withholding_tax->slug = slugify($withholding_tax->name);
            $withholding_tax->parent_identifier = 'L';
            $withholding_tax->parent_id = $payables->id;
            $withholding_tax->identifier = 'L124';
            $withholding_tax->real_depth = 3;
            $withholding_tax->balance = 0;
            $withholding_tax->school_id = $school->id;
            $withholding_tax->is_deletable = false;
            $withholding_tax->save();

            $part_time_teachers_tax = new GeneralLedgerAccounts();
            $part_time_teachers_tax->name = 'Part-time Staffs Tax';
            $part_time_teachers_tax->slug = slugify($part_time_teachers_tax->name);
            $part_time_teachers_tax->parent_identifier = 'L';
            $part_time_teachers_tax->parent_id = $payables->id;
            $part_time_teachers_tax->identifier = 'L125';
            $part_time_teachers_tax->real_depth = 3;
            $part_time_teachers_tax->balance = 0;
            $part_time_teachers_tax->school_id = $school->id;
            $part_time_teachers_tax->is_deletable = false;
            $part_time_teachers_tax->save();

            $non_current_liabilities  = new GeneralLedgerAccounts();
            $non_current_liabilities->name = 'Non Current Liabilities';
            $non_current_liabilities->slug = slugify($non_current_liabilities->name);
            $non_current_liabilities->parent_identifier = 'L';
            $non_current_liabilities->parent_id = 0;
            $non_current_liabilities->identifier = 'L2';
            $non_current_liabilities->real_depth = 1;
            $non_current_liabilities->balance = 0;
            $non_current_liabilities->school_id = $school->id;
            $non_current_liabilities->is_deletable = false;
            $non_current_liabilities->save();

            // Capital
            $grants_reserves_and_donations = new GeneralLedgerAccounts();
            $grants_reserves_and_donations->name = 'Grants, Reserves and Donations';
            $grants_reserves_and_donations->slug = slugify($grants_reserves_and_donations->name);
            $grants_reserves_and_donations->parent_identifier = 'C';
            $grants_reserves_and_donations->parent_id = 0;
            $grants_reserves_and_donations->identifier = 'C1';
            $grants_reserves_and_donations->real_depth = '1';
            $grants_reserves_and_donations->balance = 0;
            $grants_reserves_and_donations->school_id = $school->id;
            $grants_reserves_and_donations->is_deletable = false;
            $grants_reserves_and_donations->save();

            $shares = new GeneralLedgerAccounts();
            $shares->name = 'School Shares';
            $shares->slug = slugify($shares->name);
            $shares->parent_identifier = 'C';
            $shares->parent_id = 0;
            $shares->identifier = 'C1';
            $shares->real_depth = '1';
            $shares->balance = 0;
            $shares->school_id = $school->id;
            $shares->is_deletable = false;
            $shares->save();

            // Expenses
            $operation_expenses = new GeneralLedgerAccounts();
            $operation_expenses->name = 'Operations Expenses';
            $operation_expenses->slug = slugify($operation_expenses->name);
            $operation_expenses->parent_identifier = 'X';
            $operation_expenses->parent_id = 0;
            $operation_expenses->identifier = 'X1';
            $operation_expenses->real_depth = '1';
            $operation_expenses->balance = 0;
            $operation_expenses->school_id = $school->id;
            $operation_expenses->is_deletable = false;
            $operation_expenses->save();
        }
    }
}
