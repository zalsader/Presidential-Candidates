Your best candidate is: <?php echo $candidates[$bestCandidateId]; ?>
<table>
<thead>
<tr>
<th>Candidate Name:</th>
<th>Similarity:</th>
</tr>
</thead>
<tbody>
<?php foreach ($candidates as $id => $candidate):?>
    <tr>
    <td><?php echo $candidate; ?></td>
    <td><?php echo $percentages[$id] ?>%</td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>
