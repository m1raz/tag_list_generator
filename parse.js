for(i = 0; i <= 610; i++)
{
	document.getElementById("list_of_ponies_yolo").innerHTML += document.getElementById("my_pony_list").getElementsByTagName("tbody")[0].getElementsByTagName("tr")[i].getElementsByTagName("td")[0].innerHTML + "<br>";
}