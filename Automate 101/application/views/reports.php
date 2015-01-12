
<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <h3 class="text-center">
                Reported Questions.
            </h3>
            <div class="row clearfix">
                <div class="col-md-2 column">
                </div>
                <div class="col-md-6 column">
                    <table class="table">
                        <thead>

                            <tr>
                                <th>
                                    Reported User
                                </th>
                                <th>
                                    Reported User
                                </th>
                                <th>
                                    Report Type
                                </th>
                                <th>
                                    Description
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                   <?php
    foreach ($list as $key => $value) {
        
    
?>
                            <tr class="danger">
                                <td>
                                   <?php echo $value['userID']; ?>
                                </td>
                                <td>
                                    <?php echo $value['quectionID']; ?>
                                </td>
                                <td>
                                    <?php echo $value['option']; ?>
                                </td>
                                <td>
                                    <?php echo $value['sum']; ?>
                                </td>
                            </tr>
                  <?php
                                                        }
                                                    ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4 column">
                </div>
            </div>
        </div>
    </div>
</d