<style type="text/css">
    .panel{ 
        padding: 12px 21px;
        border: 1px solid #d13a3a;
        margin-bottom: 20px; 
    }
    .page_content h4{font-size: 22px; margin-bottom: 0;}
    .page_content h4 a{color: #d13a3a;}
    .page_content p{text-align: left; font-weight: 400; }
    .panel [data-toggle="collapse"]:after {
        content: "\f068";
        font-family: FontAwesome;
        float: right;
        color: #d13a3a;
        font-size: 18px;
        line-height: 22px;
    }
    .panel [data-toggle="collapse"].collapsed:after {
        content: "\f067";
        font-family: FontAwesome;
        float: right;
        color: #d13a3a;
        font-size: 18px;
        line-height: 22px;
    }
    .panel .panel-collapse{ padding-top: 10px; }
</style>

<div class="beat_list_wrapper4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1><?php echo $page_list->page_title ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="page_content">
                    <?php echo $page_list->page_content ?>
                </div>    
            </div>
        </div>
    </div>
</div>