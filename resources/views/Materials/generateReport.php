<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>               
                table,
                th,
                td {
                    border: 1px solid black;
                    border-collapse: collapse;
                }
                </style>
</head>
<body>

                <h3 style="text-align:center; margin-top:-50px; line-height: 70%">Summary of Inventory Report as of</h3>
                <h3 style="text-align:center; margin-top:-50px; line-height: 70%"><?= $start == $end?date('F d, Y',strtotime($start)):date('F d, Y',strtotime($start)) . ' to ' . date('F d, Y',strtotime($end))?></h3><br>
                <p style="line-height: 70%; font-size: 11pt;"><b>Date generated: </b><?= date('F d, Y')?></p>
                <table style="width:100%">
                    <thead>
                        <tr>

                            <th scope="col" style="text-align:center; font-weight: bold; font-size: 11pt">
                                <center>ISBN</center>
                            </th>
                            <th scope="col" style="text-align:center; font-weight: bold; font-size: 11pt">
                                <center>Title</center>
                            </th>
                            <th scope="col" style="text-align:center; font-weight: bold; font-size: 11pt">
                                <center>Copies</center>
                            </th>
                            <th scope="col" style="text-align:center; font-weight: bold; font-size: 11pt">
                                <center>Date Created</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($Material_list)):?>
                            <tr>
                                <td colspan="8" style="text-align:center"><i>No Record available</i></td>
                            </tr>
                        <?php endif;?>
                        <?php
                        foreach ($Material_list as $row) : ?>
                            <tr>
                                <td style="text-align:center; font-size: 11pt">
                                    <?= strtoupper($row['isbn']); ?>
                                </td>
                                <td style="text-align:center; font-size: 11pt">
                                    <?= ucwords($row['title']); ?>
                                </td>
                                <td style="text-align:center; font-size: 11pt">
                                    <?= ucwords($row['copies']); ?>
                                </td>
                                <td style="text-align:center; font-size: 11pt">
                                    <?= strtoupper(date('F d, Y', strtotime($row['created_at']))) ?>
                                </td>
                            </tr>
                        <?php
                        endforeach; ?>
                    </tbody>
                </table>
                <p style="text-align:center; font-size: 10pt"><i>**This report is system generated.**</i></p>
</body>
</html>