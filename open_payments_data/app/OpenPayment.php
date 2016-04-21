<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpenPayment extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $conferences = 'open_payments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'applicable_manufacturer_or_applicable_gpo_making_payment_country',
        'applicable_manufacturer_or_applicable_gpo_making_payment_id',
        'applicable_manufacturer_or_applicable_gpo_making_payment_name',
        'applicable_manufacturer_or_applicable_gpo_making_payment_state',
        'charity_indicator',
        'city_of_travel',
        'contextual_information',
        'country_of_travel',
        'covered_recipient_type',
        'date_of_payment',
        'delay_in_publication_indicator',
        'dispute_status_for_publication',
        'form_of_payment_or_transfer_of_value',
        'name_of_associated_covered_device_or_medical_supply1',
        'name_of_associated_covered_device_or_medical_supply2',
        'name_of_associated_covered_device_or_medical_supply3',
        'name_of_associated_covered_device_or_medical_supply4',
        'name_of_associated_covered_device_or_medical_supply5',
        'name_of_associated_covered_drug_or_biological1',
        'name_of_associated_covered_drug_or_biological2',
        'name_of_associated_covered_drug_or_biological3',
        'name_of_associated_covered_drug_or_biological4',
        'name_of_associated_covered_drug_or_biological5',
        'name_of_third_party_receiving_payment_or_transfer_of_value',
        'nature_of_payment_or_transfer_of_value',
        'ndc_of_associated_cover',
        'ndc_of_associated_covered_drug_or_biological1',
        'ndc_of_associated_covered_drug_or_biological2',
        'ndc_of_associated_covered_drug_or_biological3',
        'ndc_of_associated_covered_drug_or_biological4',
        'ndc_of_associated_covered_drug_or_biological5',
        'number_of_payments_included_in_total_amount',
        'payment_publication_date',
        'physician_first_name',
        'physician_middle_name',
        'physician_last_name',
        'physician_license_state_code1',
        'physician_license_state_code2', 
        'physician_license_state_code3', 
        'physician_license_state_code4', 
        'physician_license_state_code5', 
        'physician_name_suffix', 
        'physician_ownership_indicator', 
        'physician_primary_type',
        'physician_profile_id',
        'physician_specialty',
        'product_indicator',
        'program_year',
        'recipient_city',
        'recipient_country',
        'recipient_postal_code',
        'recipient_primary_business_street_address_line1',
        'recipient_primary_business_street_address_line2',
        'recipient_province',
        'recipient_state',
        'recipient_zip_code',
        'record_id',
        'state_of_travel',
        'submitting_applicable_manufacturer_or_applicable_gpo_name',
        'teaching_hospital_id',
        'teaching_hospital_name',
        'third_party_equals_covered_recipient_indicator',
        'third_party_payment_recipient_indicator',
        'total_amount_of_payment_usdollars'
    ];
}