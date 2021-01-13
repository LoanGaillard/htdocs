<?php
//permet de ce connecter à la base de donnée
    $base = new PDO('mysql:host=127.0.0.1;dbname=todolist', 'root', '');
    $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO user (id, username, password,) VALUES (:id, :username, :password,) ";
    $resultat = $base->prepare($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Toudoulist</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c1d0ab37d6.js" crossorigin="anonymous"></script>
</head>
<body>
    <header class="bg-blue-500 text-white p-4 text-center">
        <h4>TO-DO List</h4>

    </header>

    <main class="text-gray-800">
       <section class="md:w-2/3 lg:w-1/3 mx-auto mt-4">
            <div class="add text-center p-2">
                <form>
                    <input type="text" name="todo" value="" class="border p-2 rounded" placeholder="Nouvel item">
                    <input type="submit" value="Ajouter" class="py-2 px-4 rounded text-white" id="button">
                </form>
            </div>
            <table class="w-full mt-2">
            
                <tr class="border-t-2">
                    <td class="px-4 todo-item p-2">Une chose à faire</td>
                    <td class="hidden todo-input p-2">
                        <form action="traitement.php" method="post" class="text-center">
                            <input type="text" name="update" class="border p-2 rounded" value="Une chose à faire">
                            <input type="hidden" name="id" value="1">
                            <input type="submit" value="Changer" class="py-2 px-4 rounded bg-green-500 text-white"> 
                        </form>  
                    </td>
                    <td class="todo-actions text-center p-2 flex justify-center">
                        <button class="p-2 rounded todo-update mr-4" id="button2"><i class="fas fa-pen text-white"></i></button>
                        <form action="traitement.php" method="post">
                            <input type="hidden" name="delete" value="Une chose à faire">
                            <button class="p-2 rounded" id="button3"><i class="fas fa-trash text-white"></i></button>
                        </form>
                    </td>
                </tr>
                
            </table>
       </section>
    </main>

    <script>
    let buttons = document.getElementsByClassName('todo-update')
    Array.from(buttons).map(function(element, index) {
        element.addEventListener('click', function() {
            document.getElementsByClassName('todo-item')[index].style.display = 'none'
            document.getElementsByClassName('todo-input')[index].style.display = 'block'
            document.getElementsByClassName('todo-actions')[index].style.display = 'none'
            
        })
    })


        
    </script>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</html>