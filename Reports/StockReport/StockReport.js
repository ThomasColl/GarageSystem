//Name: Thomas Coll
//Student Number: C00204384

function descriptionOrder()
{
	//defines the choice as description and sets the order by secription
	document.myForm.choice.value = "Description";
	document.myForm.submit();
}
function supplierOrder()
{
	//defines the choice as Supplier and sets the order by ID
	document.myForm.choice.value = "Supplier";
	document.myForm.submit();
}