<div class="ui-paginator">
    <?= $this->Paginator->first('اولین'); ?>
    <?= $this->Paginator->prev('قبلی'); ?>
    <div class="page-status">
        <div class="status">
        <?php echo p($this->Paginator->counter(
            'شما در حال مشاهده  : صفحه {{page}} از کل {{pages}} صفحه، {{current}} رکورد از کل {{count}} رکورد هستید که از رکورد {{start}} شروع و تا رکورد {{end}} ادامه دارد.'
        ));?>
        </div>
        <div class="numbers">
        <?php echo $this->Paginator->numbers();?>

        </div>
    </div>
    <?= $this->Paginator->next('بعدی'); ?>
    <?= $this->Paginator->last('آخرین'); ?>

</div>