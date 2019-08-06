<!DOCTYPE html>
<html lang="en">
<head>
  <title>Meal Information</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

    <h3 class="text-center">InfobizSoft Office Total Meal</h3>
    <div class="container mt-5">
    <table class="table table-sm table-light">
        <thead class="table-info text-primary">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">Total Meal</th>
                <th scope="col">Posted User</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $counter = 0;
            foreach ($totalMeal as $meal) {
                ?>
                <tr> 
                    <th scope="row"><?php echo ++$counter; ?></th>
                    <td><?php echo $meal->date ?></td>
                    <td ><?php echo $meal->count ?></td>
                    <td><?php echo $meal->user ?></td>
                </tr>
            <?php } ?>


            <tr class="bg-primary text-light">
                <td style="text-align: right;">Total Meal</td>
                <td>=</td>
                <?php
                $count = 0;
                $tatal = 0;
                foreach ($totalMeal as $total) {
                    $count += $total->count;
                }
                ?>
                <td colspan="1"><?php echo $count; ?></td>
                <td >
                   Total Taka : <?php echo $count *60; ?>&nbsp;(BDT)
                </td>
            </tr>
        </tbody>
    </table>
        <p style="padding-top: 10px;float: right"><u>Authority Signature</u></p>
</div>

</body>
</html>
