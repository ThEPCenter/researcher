
<div class="container" ng-app="speacial_character">
    <h2>Special Character</h2>   

    <h3>Greek Letters</h3>
    <?php include 'greek.php'; ?>
    <table class="table-bordered">
        <tr >
            <th>Name</th><th style="text-align: center;">Sample</th><th></th>
        </tr>        
        <?php foreach ($greek_capital as $name => $number): ?>
            <tr>
                <td>Capital <?php echo $name; ?></td>
                <td style="text-align: center;"><?php echo $number; ?></td>
                <td style="text-align: center; padding: 5px;">
                    <button class="btn btn-default btn-sm" id="copy-capital-<?php echo $name; ?>" data-clipboard-text="<?php echo $number; ?>" title="Click to copy <?php echo $number; ?>">Copy</button></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- Copy to Clipboard by ZeroClipboard -->
    <script src="<?php echo base_url(); ?>ZeroClipboard/ZeroClipboard.js"></script>
    <script src="<?php echo base_url(); ?>ZeroClipboard/main.js"></script>
    <script>
<?php foreach ($greek_capital as $name => $number): ?>
            var capital_<?php echo $name; ?> = new ZeroClipboard(document.getElementById("copy-capital-<?php echo $name; ?>"));
            capital_<?php echo $name; ?>.on("ready", function (readyEvent) {
                capital_<?php echo $name; ?>.on("aftercopy", function (event) {
                    // event.target.style.display = "none";
                    // alert("Copied text to clipboard: " + event.data["text/plain"]);
                });
            });
<?php endforeach; ?>
    </script>
</div>