<!-- File: /app/View/Messages/index.ctp -->
<?php 
    echo $this->Html->css('examples');
    echo $this->Html->css('msg');
?>

    <div class="row content-box">
        <h2>留言板</h2>
        <div class="col-8" >
            <?php foreach ($msgs as $msg) {
                //var_dump($msg);
                echo $this->element('amsg',array('msg'=>$msg));
            };?>
        </div>
        <div class="shadow rightcolum col-4">
            <?php echo $this->Html->link('我要留言',array('controller' => 'msg', 'action' => 'add'),array('class'=>'btn btn-warning btn-block'));?>
        </div>
    </div>
    
    

