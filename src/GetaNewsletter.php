<?php
namespace Dialect\GetaNewsletter;

class GetaNewsletter{

	public static function contacts($id = null){
		return new ApiHandler("/contacts/", $id);
	}

	public static function subscriptions($id = null){
		return new ApiHandler("/subscriptions/", $id);
	}

	public static function attributes($id = null){
		return new ApiHandler("/attributes/", $id);
	}

	public static function lists($id = null){
		return new ApiHandler("/lists/", $id);
	}

	public static function subscription_forms($id = null){
		return new ApiHandler("/subscription_forms/", $id);
	}

	public static function responders($id = null){
		return new ApiHandler("/responders/", $id);
	}

	public static function profile($id = null){
		return new ApiHandler("/profile/", $id);
	}

	public static function reports($id = null){
		return new ApiHandler("/reports/", $id);
	}

	public static function invoices($id = null){
		return new ApiHandler("/invoices/", $id);
	}

	public static function notifications($id = null){
		return new ApiHandler("/notifications/", $id);
	}

	public static function bulkImport($contacts, $mode = 0){
		return (new ApiHandler("/contacts/import/bulk/", null))->post(["items" => $contacts, "mode" => $mode]);
	}

}