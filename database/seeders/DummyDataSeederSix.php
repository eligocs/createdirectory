<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class DummyDataSeederSix extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
  
      DB::statement("ALTER TABLE settings
        MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2");
        
      DB::statement("ALTER TABLE sms_settings
        MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2");
        
      DB::statement("ALTER TABLE states
        MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4121");
       
      DB::statement("ALTER TABLE tblacc_accounts
        MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101");
        
       
      DB::statement("ALTER TABLE tblacc_banking_rules
        MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2");
       
      DB::statement("ALTER TABLE tblacc_banking_rule_details
        MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2");
        
       
      DB::statement("ALTER TABLE tblacc_payment_mode_mappings
        MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5");
        
      DB::statement("ALTER TABLE tblacc_reconciles
        MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4");
      
      
      DB::statement("ALTER TABLE tblacc_tax_mappings
        MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8"); 
       
      DB::statement("ALTER TABLE tblactivity_log
        MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1227"); 
       
      DB::statement("ALTER TABLE tblclients
        MODIFY userid int NOT NULL AUTO_INCREMENT"); 
       
      DB::statement("ALTER TABLE tblcontact_permissions
        MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7"); 

      DB::statement("ALTER TABLE tblcountries
        MODIFY country_id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251"); 
       
      DB::statement("ALTER TABLE tblcurrencies
        MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4"); 

      DB::statement("ALTER TABLE tbldepartments
        MODIFY departmentid int NOT NULL AUTO_INCREMENT");
       
      DB::statement("ALTER TABLE tbldismissed_announcements
        MODIFY dismissedannouncementid int NOT NULL AUTO_INCREMENT");
      
      DB::statement("ALTER TABLE tblemailtemplates
        MODIFY emailtemplateid int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2065"); 
       
      DB::statement("ALTER TABLE tblevents
        MODIFY eventid int NOT NULL AUTO_INCREMENT"); 
       
      DB::statement("ALTER TABLE tblexpenses_categories
        MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6");
       
      DB::statement("ALTER TABLE tblfiles
        MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2");
       
      DB::statement("ALTER TABLE tblform_questions
        MODIFY questionid int NOT NULL AUTO_INCREMENT");
       
      DB::statement("ALTER TABLE tblform_question_box
        MODIFY boxid int NOT NULL AUTO_INCREMENT");
       
      DB::statement("ALTER TABLE tblform_question_box_description
        MODIFY questionboxdescriptionid int NOT NULL AUTO_INCREMENT");
       
      DB::statement("ALTER TABLE tblform_results
        MODIFY resultid int NOT NULL AUTO_INCREMENT");
        
      DB::statement("ALTER TABLE tblitems
        MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9");
        
       
      DB::statement("ALTER TABLE tblknowedge_base_article_feedback
        MODIFY articleanswerid int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3");
       
      DB::statement("ALTER TABLE tblknowledge_base
        MODIFY articleid int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3");
       
      DB::statement("ALTER TABLE tblknowledge_base_groups
        MODIFY groupid int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2");
       
      DB::statement("ALTER TABLE tblleads_email_integration
        MODIFY id int NOT NULL AUTO_INCREMENT COMMENT 'the ID always must be 1', AUTO_INCREMENT=2");
        
       
      DB::statement("ALTER TABLE tblmodules
        MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7"); 
       
      DB::statement("ALTER TABLE tblnotes
        MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3"); 
       
      DB::statement("ALTER TABLE tbloptions
        MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=532"); 
      DB::statement("ALTER TABLE tblpayment_modes
        MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6"); 
        
         
      DB::statement("ALTER TABLE tblpur_request_detail
        MODIFY prd_id int NOT NULL AUTO_INCREMENT"); 
      DB::statement("ALTER TABLE tblpur_unit
        MODIFY unit_id int NOT NULL AUTO_INCREMENT"); 
      DB::statement("ALTER TABLE tblpur_vendor
        MODIFY userid int UNSIGNED NOT NULL AUTO_INCREMENT"); 
      DB::statement("ALTER TABLE tblpur_vendor_cate
        MODIFY id int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7"); 
   
      DB::statement("ALTER TABLE tblsales_activity
        MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=622");  
      DB::statement("ALTER TABLE tblservices
        MODIFY serviceid int NOT NULL AUTO_INCREMENT");
      
        
      DB::statement("ALTER TABLE tblstaff
        MODIFY staffid int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=328");  
       
      DB::statement("ALTER TABLE tbltickets_priorities
        MODIFY priorityid int NOT NULL AUTO_INCREMENT"); 
      DB::statement("ALTER TABLE tbltickets_status
        MODIFY ticketstatusid int NOT NULL AUTO_INCREMENT");  
  
   
      DB::statement("ALTER TABLE tbluser_meta
        MODIFY umeta_id bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8");  
      DB::statement("ALTER TABLE tblware_unit_type
        MODIFY unit_type_id int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7");  
       
      DB::statement("ALTER TABLE tblwh_sub_group
        MODIFY id int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11"); 
      DB::statement("ALTER TABLE tbl_get_account_type_details
        MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142"); 
      DB::statement("ALTER TABLE teamleaders
        MODIFY id int NOT NULL AUTO_INCREMENT"); 
      DB::statement("ALTER TABLE terms
        MODIFY term_id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4");   
      DB::statement("ALTER TABLE users
        MODIFY user_id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=327"); 
      DB::statement("ALTER TABLE user_dashboard
        MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33");
       
      DB::statement("ALTER TABLE user_permission
        MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=348");
      DB::statement("ALTER TABLE user_permission_category
        MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12");
      DB::statement("ALTER TABLE user_permission_sub_category
        MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76");
      DB::statement("ALTER TABLE user_role
        MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138");
      DB::statement("ALTER TABLE user_role_old
        MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12"); 
      DB::statement("ALTER TABLE vouchers
        MODIFY voucher_id int NOT NULL AUTO_INCREMENT"); 
      DB::statement("ALTER TABLE `train_city`
      MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=804"); 
      DB::statement("ALTER TABLE `bus_cities`
      MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17018"); 

    }
}