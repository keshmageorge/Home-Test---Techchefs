<!DOCTYPE html>
<html lang="en">
<head>
  <title>Test Project</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
        body{
            background-image: url("https://images.pexels.com/photos/743986/pexels-photo-743986.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940");
            background-color: #cccccc; /* Used if the image is unavailable */
            height: 500px; /* You must set a specified height */
            background-position: center; /* Center the image */
            background-repeat: no-repeat; /* Do not repeat the image */
            background-size: cover; /* Resize the background image to cover the entire container */
        }
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
</head>
<?php 

$result = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $str1 = trim($_POST["string1"]);
    $str2 = trim($_POST["string2"]);
    $strnew = ""; //resultant string
    $l1 = strlen($str1); //Length of string 1
    $l2 = strlen($str2); //Length of string 2
    $data = array_fill(0, $l2, 1); //Array to evalvate string 2
    for ($index1 = 0; $index1 < $l1; $index1++) {
        $ch1 = substr($str1,$index1,1);
        $isMatched = true;
        for ($index2 = 0; $index2 < $l2; $index2++) {
            $ch2 = substr($str2,$index2,1);
            if ($ch1 == $ch2) {
                $data[$index2] = 0;
                $isMatched = false;
            }
        }
        if($isMatched) {
            $strnew .= $ch1;
        }
    }
    $result['str1'] = $strnew;

    $strnew = ''; //Empty the string
    for ($index = 0; $index < $l2; $index++) {
        if($data[$index] == 1)
        {
            $strnew .= $str2[$index];
        }
    }
    $result['str2'] =  $strnew;
}


?>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
        <div class="row">
        <h2 class="mt-5">Enter two string</h2>
        <div class='form' style="margin-top: 92px; margin-left: -223px;">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>String 1</label>
                <input type="text" name="string1" class="form-control" value=<?php echo empty($str1) ? "" : $str1; ?> >
                <label>String 2</label>
                <input type="text" name="string2" class="form-control" value=<?php echo empty($str2) ? "" : $str2; ?>>
            </div>
            <input type="submit" class="btn btn-primary" value="Submit">
        </form>
        </div>
    </div>
        </div>
        <div class="col-md-6" style="margin-top: 60px;">
        <table class="table table-bordered">
    <thead>
      <tr>
        <th>Output 1</th>
        <th>Output 2</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo empty($result['str1']) ? "null" : $result['str1']; ?></td>
        <td><?php echo empty($result['str2']) ? "null" : $result['str2']; ?></td>
      </tr>
    </tbody>
  </table>
        </div>
    </div>
</div>
</body>
</html>