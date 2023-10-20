<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class DummyDataSeederFive extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


      DB::statement("ALTER TABLE ac_booking_reference_details 
        ADD KEY frk_cus_account_id (cus_account_id) USING BTREE");
   
     
      DB::statement("ALTER TABLE cab_booking 
        ADD KEY frk_iti_id (iti_id) USING BTREE"); 
      
    
   
      DB::statement("ALTER TABLE customer_followup 
        ADD KEY cf_cus_id_fk (customer_id) USING BTREE");
      
      
      DB::statement("ALTER TABLE flight_details 
        ADD KEY frk_flight_key (iti_id) USING BTREE");
      
    
      DB::statement("ALTER TABLE hotel_booking 
        ADD KEY iti_id (iti_id) USING BTREE");
      
    
      DB::statement("ALTER TABLE hotel_categories 
        ADD UNIQUE KEY star_id (star_id)");
      
    
 
      DB::statement("ALTER TABLE hotel_room_rates 
        ADD KEY frk_hotel_id (hotel_id) USING BTREE"); 
       
       
      DB::statement("ALTER TABLE itinerary 
        ADD KEY agent_ind (agent_id) USING BTREE,
        ADD KEY frk_c_id (customer_id) USING BTREE,
        ADD KEY is_amendmenr_index (is_amendment) USING BTREE,
        ADD KEY iti_status_index (iti_status) USING BTREE,
        ADD KEY iti_type (iti_type) USING BTREE,
        ADD KEY parent_iti_id (parent_iti_id) USING BTREE");
      
 
      DB::statement("ALTER TABLE itinerary_discount_price_data 
        ADD KEY iti_pay_dis_frk (iti_id) USING BTREE");
       
       DB::statement("ALTER TABLE itinerary_visiter_data 
        ADD KEY frkvisiter_iti (iti_id) USING BTREE");
      
      
      DB::statement("ALTER TABLE iti_amendment_temp 
        ADD KEY frk_am_iti_id (iti_id) USING BTREE,
        ADD KEY frk_cus_id (customer_id) USING BTREE");
       
       DB::statement("ALTER TABLE iti_before_amendment 
        ADD KEY frk_am_iti_id (iti_id) USING BTREE,
        ADD KEY frk_cus_id (customer_id) USING BTREE");
      
     
      DB::statement("ALTER TABLE iti_befor_flight_details 
        ADD KEY frk_flight_key (iti_id) USING BTREE");
     
     DB::statement("ALTER TABLE iti_befor_train_details 
        ADD KEY frk_train_iti_id (iti_id) USING BTREE");
      
      
       
       DB::statement("ALTER TABLE iti_email_followup 
        ADD KEY frk_iti_email_f (iti_id) USING BTREE");
      
    
      DB::statement("ALTER TABLE iti_followup 
        ADD KEY frk_follow_iti_id (iti_id) USING BTREE,
        ADD KEY ind_follow_cus_id (customer_id) USING BTREE");
      
   
      
       
      DB::statement("ALTER TABLE iti_payment_details 
        ADD KEY frk_cus_pay (customer_id) USING BTREE,
        ADD KEY frk_iti_pay (iti_id) USING BTREE");
      
     
      DB::statement("ALTER TABLE iti_payment_transactions 
        ADD KEY frk_tra_iti_key (iti_id) USING BTREE"); 
      
      
      DB::statement("ALTER TABLE iti_temp_flight_details 
        ADD KEY frk_flight_key (iti_id) USING BTREE");
      
    
      DB::statement("ALTER TABLE iti_temp_train_details 
        ADD KEY frk_train_iti_id (iti_id) USING BTREE");
      
    
      DB::statement("ALTER TABLE iti_vouchers_status 
        ADD KEY iti_voucher_frk (iti_id) USING BTREE");
      
   
        
      DB::statement("ALTER TABLE marketing_customer_followup 
        ADD KEY cf_cus_id_fk (customer_id) USING BTREE");
      
      
      DB::statement("ALTER TABLE new_setting 
        ADD UNIQUE KEY meta_key (meta_key)");
      
     
      DB::statement("ALTER TABLE notifications 
        ADD KEY index_customerID (customer_id) USING BTREE");
      
       
      DB::statement("ALTER TABLE offer 
        ADD UNIQUE KEY offerid (offerid)"); 
  
        
      
      DB::statement("ALTER TABLE payment_refund 
        ADD KEY frk_tra_iti_key (iti_id) USING BTREE");
      
       
      DB::statement("ALTER TABLE reference_customer_followup 
        ADD KEY cf_cus_id_fk (customer_id) USING BTREE");
      
    
       
      DB::statement("ALTER TABLE tblactivity_log 
        ADD KEY staffid (staffid)");
       
 
 DB::statement("ALTER TABLE tblclients 
        ADD KEY country (country),
        ADD KEY leadid (leadid),
        ADD KEY company (company),
        ADD KEY active (active)");
      
   
      DB::statement("ALTER TABLE tblconsents 
        ADD KEY purpose_id (purpose_id),
        ADD KEY contact_id (contact_id),
        ADD KEY lead_id (lead_id)");
      
      
     
      DB::statement("ALTER TABLE tblcontacts 
        ADD KEY userid (userid),
        ADD KEY firstname (firstname),
        ADD KEY lastname (lastname),
        ADD KEY email (email),
        ADD KEY is_primary (is_primary)");
      
      
      DB::statement("ALTER TABLE tblcontracts 
        ADD KEY client (client),
        ADD KEY contract_type (contract_type)");
      
 
      
      DB::statement("ALTER TABLE tblcreditnotes 
        ADD KEY currency (currency),
        ADD KEY clientid (clientid),
        ADD KEY project_id (project_id)");
      
     
      
      DB::statement("ALTER TABLE tblcustomer_admins
        ADD KEY customer_id (customer_id),
        ADD KEY staff_id (staff_id)");
      
     
      DB::statement("ALTER TABLE tblcustomer_groups 
        ADD KEY groupid (groupid),
        ADD KEY customer_id (customer_id)");
      
    
       
      DB::statement("ALTER TABLE tblcustomfieldsvalues 
        ADD KEY relid (relid),
        ADD KEY fieldto (fieldto),
        ADD KEY fieldid (fieldid)");
      
       
      DB::statement("ALTER TABLE tbldepartments 
        ADD KEY name (name)");
      
      
      DB::statement("ALTER TABLE tbldismissed_announcements 
        ADD KEY announcementid (announcementid),
        ADD KEY staff (staff),
        ADD KEY userid (userid)");
      
      
       
      DB::statement("ALTER TABLE tblestimates 
        ADD KEY clientid (clientid),
        ADD KEY currency (currency),
        ADD KEY project_id (project_id),
        ADD KEY sale_agent (sale_agent),
        ADD KEY status (status)");
      
       
      
     
      DB::statement("ALTER TABLE tblexpenses 
        ADD KEY clientid (clientid),
        ADD KEY project_id (project_id),
        ADD KEY category (category),
        ADD KEY currency (currency)");
      
       
      DB::statement("ALTER TABLE tblfiles 
        ADD KEY rel_id (rel_id),
        ADD KEY rel_type (rel_type)");
       
        
      DB::statement("ALTER TABLE tblinvoicepaymentrecords 
        ADD KEY invoiceid (invoiceid),
        ADD KEY paymentmethod (paymentmethod)");
      
     
      DB::statement("ALTER TABLE tblinvoices 
        ADD KEY currency (currency),
        ADD KEY clientid (clientid),
        ADD KEY project_id (project_id),
        ADD KEY sale_agent (sale_agent),
        ADD KEY total (total),
        ADD KEY status (status)");
       
       DB::statement("ALTER TABLE tblitemable 
        ADD KEY rel_id (rel_id),
        ADD KEY rel_type (rel_type),
        ADD KEY qty (qty),
        ADD KEY rate (rate)");
  
  DB::statement("ALTER TABLE tblitems 
        ADD KEY tax (tax),
        ADD KEY tax2 (tax2),
        ADD KEY group_id (group_id)");
       
      DB::statement("ALTER TABLE tblitem_tax 
        ADD KEY itemid (itemid),
        ADD KEY rel_id (rel_id)");
      
       
   
      DB::statement("ALTER TABLE tblleads 
        ADD KEY name (name),
        ADD KEY company (company),
        ADD KEY email (email),
        ADD KEY assigned (assigned),
        ADD KEY status (status),
        ADD KEY source (source),
        ADD KEY lastcontact (lastcontact),
        ADD KEY dateadded (dateadded),
        ADD KEY leadorder (leadorder),
        ADD KEY from_form_id (from_form_id)");
       
     
      DB::statement("ALTER TABLE tblnotes 
        ADD KEY rel_id (rel_id),
        ADD KEY rel_type (rel_type)");
      
      
      DB::statement("ALTER TABLE tblpinned_projects 
        ADD KEY project_id (project_id)");
      
     
      DB::statement("ALTER TABLE tblprojects 
        ADD KEY clientid (clientid),
        ADD KEY name (name)");
       
      DB::statement("ALTER TABLE tblproject_members 
        ADD KEY project_id (project_id),
        ADD KEY staff_id (staff_id)");
       
      DB::statement("ALTER TABLE tblproject_settings 
        ADD KEY project_id (project_id)");
      
     
      DB::statement("ALTER TABLE tblproposals 
        ADD KEY status (status)");
        
       
      DB::statement("ALTER TABLE tblreminders 
        ADD KEY rel_id (rel_id),
        ADD KEY rel_type (rel_type),
        ADD KEY staff (staff)");
       
   
      
      DB::statement("ALTER TABLE tblsessions 
        ADD KEY ci_sessions_timestamp (timestamp)"); 
       
       DB::statement("ALTER TABLE tblstaff 
        ADD KEY firstname (firstname),
        ADD KEY lastname (lastname)");
      
       
     
      DB::statement("ALTER TABLE tblsubscriptions 
        ADD KEY clientid (clientid),
        ADD KEY currency (currency),
        ADD KEY tax_id (tax_id)");
      
       
      DB::statement("ALTER TABLE tbltaggables
        ADD KEY rel_id (rel_id),
        ADD KEY rel_type (rel_type),
        ADD KEY tag_id (tag_id)");
      
      DB::statement("ALTER TABLE tbltags 
      ADD KEY name (name)");
    
    
    DB::statement("ALTER TABLE tbltasks 
      ADD KEY rel_id (rel_id),
      ADD KEY rel_type (rel_type),
      ADD KEY milestone (milestone),
      ADD KEY kanban_order (kanban_order),
      ADD KEY status (status)");
    
     
    DB::statement("ALTER TABLE tbltaskstimers 
      ADD KEY task_id (task_id),
      ADD KEY staff_id (staff_id)");
    
      
     DB::statement("ALTER TABLE tbltask_assigned 
      ADD KEY taskid (taskid),
      ADD KEY staffid (staffid)");
    
    
    DB::statement("ALTER TABLE tbltask_checklist_items 
      ADD KEY taskid (taskid)");
    
    DB::statement("ALTER TABLE tbltask_comments 
      ADD KEY file_id (file_id),
      ADD KEY taskid (taskid)");
     
    
    DB::statement("ALTER TABLE tbltickets 
      ADD KEY service (service),
      ADD KEY department (department),
      ADD KEY status (status),
      ADD KEY userid (userid),
      ADD KEY priority (priority),
      ADD KEY project_id (project_id),
      ADD KEY contactid (contactid)");
   
 
      
    DB::statement("ALTER TABLE tbltwocheckout_log 
      ADD KEY invoice_id (invoice_id)");
    
       
    DB::statement("ALTER TABLE train_details 
      ADD KEY frk_train_iti_id (iti_id) USING BTREE");
    
     
    DB::statement("ALTER TABLE travel_booking 
      ADD KEY frk_vtf_iti_id (iti_id) USING BTREE");
    
    
    DB::statement("ALTER TABLE users 
      ADD UNIQUE KEY email (email),
      ADD UNIQUE KEY user_name (user_name)");
    
      
    DB::statement("ALTER TABLE user_role_old 
      ADD UNIQUE KEY role_id (role_id)");
    
    
    DB::statement("ALTER TABLE vehicles_rates_by_tour 
      ADD KEY frk_key_vid (vehicle_id) USING BTREE");
    
     
    DB::statement("ALTER TABLE airports
      MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4724");
    
    DB::statement("ALTER TABLE bank_details
      MODIFY bank_id int NOT NULL AUTO_INCREMENT");
      
    DB::statement("ALTER TABLE cities
      MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48341;");
     
    DB::statement("ALTER TABLE client_messages
      MODIFY msg_id int NOT NULL AUTO_INCREMENT");
     
    DB::statement("ALTER TABLE countries
      MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247");
     
    DB::statement("ALTER TABLE customers_inquery
      MODIFY customer_id int NOT NULL AUTO_INCREMENT");
     
    DB::statement("ALTER TABLE customer_type
      MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10"); 
     
    DB::statement("ALTER TABLE flight_details
      MODIFY id_bef int NOT NULL AUTO_INCREMENT");
     
    DB::statement("ALTER TABLE homepage_setting
      MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2"); 
     
    DB::statement("ALTER TABLE hotel_categories
      MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5");
    
    DB::statement("ALTER TABLE hotel_category
      MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5");
     
    DB::statement("ALTER TABLE hotel_room_rates
      MODIFY htr_id int NOT NULL AUTO_INCREMENT"); 
      
    DB::statement("ALTER TABLE hrr_iti_amendment_temp
      MODIFY id_temp int NOT NULL AUTO_INCREMENT");
     
    DB::statement("ALTER TABLE hrr_iti_before_amendment
      MODIFY id_bef int NOT NULL AUTO_INCREMENT"); 
     
    DB::statement("ALTER TABLE itinerary
      MODIFY iti_id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26"); 
    
 
    DB::statement("ALTER TABLE iti_befor_flight_details
      MODIFY id_bef int NOT NULL AUTO_INCREMENT"); 
     
    DB::statement("ALTER TABLE iti_payment_transactions
      MODIFY tra_id int NOT NULL AUTO_INCREMENT");
      
    DB::statement("ALTER TABLE iti_temp_flight_details
      MODIFY id_temp int NOT NULL AUTO_INCREMENT");
     
    DB::statement("ALTER TABLE iti_temp_train_details
      MODIFY id_temp int NOT NULL AUTO_INCREMENT");
      
    DB::statement("ALTER TABLE marketing_category
      MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3");
      
     
    DB::statement("ALTER TABLE meal_plan
      MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17");
     
    
    DB::statement("ALTER TABLE new_setting
      MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31");
      
     
    DB::statement("ALTER TABLE offer
      MODIFY offerid int NOT NULL AUTO_INCREMENT");
      
     
    DB::statement("ALTER TABLE office_branches
      MODIFY branch_id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2");
      
     
    DB::statement("ALTER TABLE packages
      MODIFY package_id int NOT NULL AUTO_INCREMENT");
     
    DB::statement("ALTER TABLE package_category
      MODIFY p_cat_id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8");
     
    DB::statement("ALTER TABLE payment_refund
      MODIFY tra_id int NOT NULL AUTO_INCREMENT");
     
    DB::statement("ALTER TABLE pdf_setting
      MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7");
     
    DB::statement("ALTER TABLE pdf_static_image
      MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7");
      
    DB::statement("ALTER TABLE permission_sub_sub_category
      MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7");
      
    DB::statement("ALTER TABLE role_has_permission
      MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9050");
     
    DB::statement("ALTER TABLE room_category
      MODIFY room_cat_id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6");
      
    DB::statement("ALTER TABLE season_type
      MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8");
      

    }
}