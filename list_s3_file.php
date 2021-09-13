
 <html>
 <head>
 <title>Listing Bucket data</title>
 <style>
 table, th, td {
 border: 1px solid black;
 border-collapse: collapse;
 }
 </style>
 </head>
 <body>
 <table >
 <thead>
 <tr>
 <td>File Name</td>
 </tr>
 </thead>
 <tbody>
 <?php foreach ($objects as $object): ?>
 <tr>
 <td><?php echo $object['Key']; ?></td>
 </tr>
 <?php endforeach; ?>
 </tbody>
 </table>
 </body>
 </html>