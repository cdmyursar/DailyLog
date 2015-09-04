 <div class="dropdown">
                    <select name="shampoo" class="form-control">
                        <option name="reg" class="shampoo" value="0">Reg. Shampoo</option>
                        <option name="oatmeal" class="shampoo" value="$5.00 Oatmeal">Oatmeal</option>
                        <option name="hypo" class="shampoo" value="$5.00 Hypo">Hypo</option>
                        <option name="tar" class="shampoo" value="$5.00 Tar N Sulfur">Tar and Sulfur</option>
                        <option name="white" class="shampoo" value="$5.00 Whitening">Whitening</option>
                        <option name="flea" class="shampoo" value="$5.00 Flea Shampoo">Flea</option>
                    </select>
                </div>
<script type="text/javascript">
    var x = document.getElementsByClassName("shampoo");
    document.write(x[2].value);
    //document.write(x[2].selected);
    
    for(var i=0; i<x.length;i++){
        if(x[i].selected){
            document.write(x[i].value);
        }
    }
    function nailfile(){
            document.write(forms);
}
</script>