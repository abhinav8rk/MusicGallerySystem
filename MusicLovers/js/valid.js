<script>
function validate(){
    var x = document.forms['search']['search_text'].value;
    if(x == null || x == ""){
        alert("Name must be filled out");
        return false;
    }
}
</script>