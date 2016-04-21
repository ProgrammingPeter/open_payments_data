<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpenPaymentsDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Migration script to create open_payments table including three new columns - id, created_at, updated_at
        Schema::create('open_payments', function (Blueprint $table) {
            $table->string('applicable_manufacturer_or_applicable_gpo_making_payment_country')->default('');
            $table->integer('applicable_manufacturer_or_applicable_gpo_making_payment_id')->default(NULL);
            $table->string('applicable_manufacturer_or_applicable_gpo_making_payment_name')->default('');
            $table->string('applicable_manufacturer_or_applicable_gpo_making_payment_state')->default('');
            $table->string('charity_indicator')->default('');
            $table->string('city_of_travel')->default('');
            $table->string('contextual_information')->default('');
            $table->string('country_of_travel')->default('');
            $table->string('covered_recipient_type')->default('');
            $table->dateTime('date_of_payment')->default(0);
            $table->string('delay_in_publication_indicator')->default('');
            $table->string('dispute_status_for_publication')->default('');
            $table->string('form_of_payment_or_transfer_of_value')->default('');
            $table->string('name_of_associated_covered_device_or_medical_supply1')->default('');
            $table->string('name_of_associated_covered_device_or_medical_supply2')->default('');
            $table->string('name_of_associated_covered_device_or_medical_supply3')->default('');
            $table->string('name_of_associated_covered_device_or_medical_supply4')->default('');
            $table->string('name_of_associated_covered_device_or_medical_supply5')->default('');
            $table->string('name_of_associated_covered_drug_or_biological1')->default('');
            $table->string('name_of_associated_covered_drug_or_biological2')->default('');
            $table->string('name_of_associated_covered_drug_or_biological3')->default('');
            $table->string('name_of_associated_covered_drug_or_biological4')->default('');
            $table->string('name_of_associated_covered_drug_or_biological5')->default('');
            $table->string('name_of_third_party_receiving_payment_or_transfer_of_value')->default(''); //Original name was too long, had to shortened name_of_third_party_entity_receiving_payment_or_transfer_of_value
            $table->string('nature_of_payment_or_transfer_of_value')->default('');
            $table->string('ndc_of_associated_cover')->default('');
            $table->string('ndc_of_associated_covered_drug_or_biological1')->default('');
            $table->string('ndc_of_associated_covered_drug_or_biological2')->default('');
            $table->string('ndc_of_associated_covered_drug_or_biological3')->default('');
            $table->string('ndc_of_associated_covered_drug_or_biological4')->default('');
            $table->string('ndc_of_associated_covered_drug_or_biological5')->default('');
            $table->integer('number_of_payments_included_in_total_amount')->default(NULL);
            $table->dateTime('payment_publication_date')->default(0);
            $table->string('physician_first_name')->default(''); 
            $table->string('physician_middle_name')->default(''); 
            $table->string('physician_last_name')->default(''); 
            $table->string('physician_license_state_code1')->default(''); 
            $table->string('physician_license_state_code2')->default(''); 
            $table->string('physician_license_state_code3')->default(''); 
            $table->string('physician_license_state_code4')->default(''); 
            $table->string('physician_license_state_code5')->default(''); 
            $table->string('physician_name_suffix')->default(''); 
            $table->string('physician_ownership_indicator')->default(''); 
            $table->string('physician_primary_type')->default('');
            $table->integer('physician_profile_id')->default(NULL);
            $table->string('physician_specialty')->default('');
            $table->string('product_indicator')->default('');
            $table->integer('program_year')->default(NULL);
            $table->string('recipient_city')->default('');
            $table->string('recipient_country')->default('');
            $table->string('recipient_postal_code')->default('');
            $table->string('recipient_primary_business_street_address_line1')->default('');
            $table->string('recipient_primary_business_street_address_line2')->default('');
            $table->string('recipient_province')->default('');
            $table->string('recipient_state')->default('');
            $table->integer('recipient_zip_code')->default(NULL);
            $table->integer('record_id');
            $table->string('state_of_travel')->default('');
            $table->string('submitting_applicable_manufacturer_or_applicable_gpo_name')->default('');
            $table->integer('teaching_hospital_id')->default(NULL);
            $table->string('teaching_hospital_name')->default('');
            $table->string('third_party_equals_covered_recipient_indicator')->default('');
            $table->string('third_party_payment_recipient_indicator')->default('');
            $table->decimal('total_amount_of_payment_usdollars', 10, 2)->default(NULL);
            $table->timestamps();
        });

        Schema::table('open_payments', function($table)
        {
            $table->primary('record_id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('open_payments');
    }
}
