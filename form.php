<?php
    $data = array();

    if (isset($_POST['submit'])) {

        $data = array(
            'optionA' => isset($_POST['optionA']) ? $_POST['optionA'] : 0,
            'optionB' => isset($_POST['optionB']) ? $_POST['optionB'] : 0,
            'select1' => isset($_POST['select1']) ? $_POST['select1'] : '',
            'select2' => isset($_POST['select2']) ? $_POST['select2'] : '',
            'select3' => isset($_POST['select3']) ? $_POST['select3'] : '',
            'select4' => isset($_POST['select4']) ? $_POST['select4'] : '',
        );

    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Example</title>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>

<?php if (count($data)): ?>
    <h3>Resultado: </h3>
    <code>
        <?= json_encode($data) ?>
    </code>
    <hr>
<?php endif; ?>


<form method="POST" action="form.php">
    <label>
        <input type="checkbox" name="optionA" value="1"/> A
    </label>

    <label>
        <input type="checkbox" name="optionB" value="1"/> B
    </label>

    <select name="select1">
        <option></option>
        <option value=1>1</option>
        <option value2>2</option>
    </select>

    <select name="select2">
        <option></option>
        <option value=1>1</option>
        <option value2>2</option>
    </select>

    <select name="select3">
        <option></option>
        <option value=1>1</option>
        <option value2>2</option>
    </select>

    <select name="select4">
        <option></option>
        <option value=1>1</option>
        <option value2>2</option>
    </select>

    <input type="submit" name="submit" value="Tu Acción">
</form>

<script type="text/javascript">

    $(function(){
        var isValidToSubmit = function(){
            var checkboxes = $("input[type='checkbox']:checked").length,
                selects = $('select'),
                validation = false;

            selects.each(function(){
                var value = $(this).val();
                if(value){
                    validation = true;
                }
            });

            if(checkboxes === 0){
                validation = false;
            }

            return validation;
        };

        var onClick = function(e){
            e.preventDefault();
            e.stopPropagation();

            if(isValidToSubmit()){ // do submit
                $('form').submit();
            }else{  // notify any issue
                console.info('show errors');
            }
        };

        $('button').click(onClick);
    });

</script>


</body>
</html>