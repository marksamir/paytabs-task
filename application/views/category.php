<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Paytabs task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>


    <ul class="list-group">
        <?php
        echo $categories;
        ?>

    </ul>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(function() {
            const loaded = {

            };


            $(".list-group-item p").on('click', handleClick);

            function handleClick(e) {
                e.stopPropagation();
                let currItem = $(this);
                const id = $(currItem).parent().attr('id');
                if(loaded[id]) return;
                loaded[id] = true;
                $.ajax({
                    url: `/codeigniter_test/index.php/category/fetch_sub_category/${id}`,
                    method: "GET",
                    success: function(data) {
                        $(`
                           <ul class="list-group">
                                <li id="${data[0].category_id}" class="list-group-item"><p>${data[0].category_name}</p></li>
                                <li id="${data[1].category_id}" class="list-group-item"><p>${data[1].category_name}</p></li>
                            </ul>
                        `).appendTo($(currItem));
                        $(".list-group-item p").on("click", handleClick);
                    },
                    errorion(data) {
                        alert(data);
                    },
                })
            }
        });
    </script>
</body>

</html>