<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Add more field</title>
  </head>
  <body class="bg-dark">
    <div class="container">
        <div class="row my-4">
            <div class="col-lg-10 mx-auto">
                <div class="card shadow">
                    <div class="card-header">
                        <h4>Add Items</h4>
                    </div>
                    <div class="card-body p-4">
                  <form action="" method="POST" id="add_form">
                   <div id="show_item">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <input type="text" name="product_name[]" class="form-control" placeholder="Item Name" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <input type="number" name="product_price[]" class="form-control" placeholder="Item Price" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <input type="number" name="product_qty[]" class="form-control" placeholder="Item Quantity" required>
                        </div>
                        <div class="col-md-2 mb-3 d-grid">
                            <button class="btn btn-success  add_item_btn">Add More</button>
                        </div>
                    </div>
                  </div>
                    <button  type="submit" value="Add" class="btn btn-primary w-25" id="add_btn">Add</button>
                   </div>
                 </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $(".add_item_btn").click(function(e){
                e.preventDefault();
                $("#show_item").prepend(`<div class="row">
                        <div class="col-md-4 mb-3">
                            <input type="text" name="product_name[]" class="form-control" placeholder="Item Name" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <input type="number" name="product_price[]" class="form-control" placeholder="Item Price" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <input type="number" name="product_qty[]" class="form-control" placeholder="Item Quantity" required>
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
    </script>
  </body>
</html>