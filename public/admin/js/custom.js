// $(document).ready(function(){
//     $('.add_attribute').click(function(e){
//         e.preventDefault();
//         alert("chandan");
//         var new_input=' <input type="text" class="form-control"  name="color">';
//       $('.add_value').append(new_input);
//     //   $('#total_chq').val(new_chq_no)
//     });
// });

$(document).ready(function(){
    $(".add_attribute").click(function(e){
        e.preventDefault();
        var firstname =  $('#select_attr').val();
        alert(firstname)
        if(firstname == '1')
        {
        $("#show_item").prepend(`<div class="row">
                <div class="col-md-6 mb-3">
                    <input type="text" name="value[]" class="form-control" placeholder="Please Enter Color" required>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-danger  remove_item_btn">Remove</button>
                </div>
            </div>`);
        }
        else{
            $("#show_item").prepend(`<div class="row">
                <div class="col-md-6 mb-3">
                    <input type="text" name="value[]" class="form-control" placeholder="Please Enter Size" required>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-danger  remove_item_btn">Remove</button>
                </div>
            </div>`);
        }
    });
});

$(document).on('click','.remove_item_btn',function(e){
    e.preventDefault();
    let row_item=$(this).parent().parent();
    $(row_item).remove();
});


        $(document).ready(function(){
            $(".add_item_btn").click(function(e){
                e.preventDefault();
                $("#show_item").prepend(`<div class="row">
                <div class="col-md-4 mb-3">
                  <select class="form-select" name="product_attribute_id[]">
                     <option value="">Select a Attribute</option>
                     <option value="Size">Size</option>
                     <option value="Color">Color</option>
            </select>
            </div>
                        <div class="col-md-3 mb-3">
                            <input type="text" name="value[]" class="form-control" placeholder="Enter value of Attribute" >
                            <span class="span"></span>
                        </div>
                        <div class="col-md-2 mb-3 d-grid">
                            <button class="btn btn-danger  remove_item_btn">Remove</button>
                        </div>
                    </div>`);
            });
            $(document).on('click','.remove_item_btn',function(e){
                e.preventDefault();
                let row_item=$(this).parent().parent();
                $(row_item).remove();
            });
        });
    