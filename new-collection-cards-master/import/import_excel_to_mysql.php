<div class="form-group add-bs" style="margin: 0 auto">
    <div class="card stacked-form">
        <div class="card-header ">
            <h4 class="card-title">Import Excel</h4>
            <div class="row">
                Download file in extantion &nbsp
                <a class="text-info" href='import/table.xlsx'> .xlsx </a>,&nbsp
                <a class="text-info" href='import/table.xls'> .xls </a>,&nbsp
                <a class="text-info" href='import/table.ovs'> .ovs </a>&nbsp
                or&nbsp
                <a class="text-info" href='import/table.ods'> .ods </a>
            </div>
            
        </div>
        <div class="container">
                <div class="form-group">
                    <label>Select excel file</label>
                    <input type="file" name="import_excel" class="form-control" />
                </div>
                <input type="submit" name="import" id="import" class="btn btn-primary btn-add mb-1" value="Import" />
                <div class="ee">
                <div class="text-success ">
                    You have successfully added checklist
                    <br>
                    <a href='custom_checklist.php' class="text-info">Go to checklist?</a>
                </div>
            </div>
        </div>
    </div>
    <div id="message" class="mt-1"></div>
</div>       
    