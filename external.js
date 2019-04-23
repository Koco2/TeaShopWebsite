function inputCheck(){
	if (document.orderForm.productId.value == ""){
		alert("product id is required");
	}	
	else if (document.orderForm.quantity.value == ""){
		alert("quantity must be a positive integer");
	}
	else if (document.orderForm.firstname.value == ""){
		alert("firstname is required");
	}
	else if (document.orderForm.lastname.value == ""){
		alert("lastname is required");
	}
	else if (document.orderForm.phoneNum.value == ""){
		alert("phone number is required");
	}
	else if (document.orderForm.address1.value == ""){
		alert("address line 1 is required");
	}
	else if (document.orderForm.address3.value == ""){
		alert("stat is required");
	}
	else if (document.orderForm.address4.value == ""){
		alert("ZIP code is required");
	}
	else if (document.orderForm.creditCard.value == ""){
		alert("creditCard number is required");
	}
	else if (document.orderForm.expirationDate.value == ""){
		alert("expirationDate is invalid");
	}
	else if (document.orderForm.securityCode.value == ""){
		alert("securityCode empty");
	}	
}