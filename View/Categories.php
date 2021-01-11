
<div id="content">
        <a onClick="openSlideMenu()">
            <i class="fas fa-bars detail-openMenu"></i>
        </a>
</div>
<div class="category-product" id="menu">
    <a class="category-product__close" onClick="closeSlideMenu()">
        <i class="fas fa-times"></i>
    </a>
    <h2 class="category-product__name">San Pham</h2>
    <div class="category-product-title">
        <?php
        include_once './Model/DMSP.php';
        $DMSP_Obj = new DMSP();
        $DMSP = $DMSP_Obj->GetDMSP();
        $HMTDM = $DMSP_Obj->GetHMTDM();
        ?>
        <?php
        foreach ($DMSP as $DMSPs) {
        ?>
            <h3 class='font-p adt-left-title'><?php echo $DMSPs['DMSP']; ?></h1>
                <ul class="adt-left-title">
                    <?php
                    //Loop into child of DMSP
                    foreach ($HMTDM as $HMTDMs) {
                        if ($HMTDMs['DMSP_Id'] == $DMSPs['DMSP_Id']) {
                    ?>
                            <li class="adt-left__group"><a href="?Action=<?php echo $HMTDMs['TenHMTDM']; ?>" class="adt-left__link"><?php echo $HMTDMs['TenHMTDM']; ?></a></li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            <?php
        }
            ?>
    </div>
</div>
    <div class="adt-img adt-img-left">
    </div>
    <div class="adt adt-right ">
    </div>
    </div>
<script src="./Public/js/slide-left.js"></script>
