<?php ?>
<?php
$Router = Router::url('/', true);
?>
<div class="sidebar" data-color="brown" data-active-color="warning">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
    <div class="logo">
        <a href="#" class="simple-text logo-mini">
            <div class="logo-image-small">
                <!-- <img src="<?php echo $Router; ?>paper-dashboard/assets/img/logo-small.png"> -->
            </div>
        </a>
        <a href="<?php echo ($Router == "https://localhost/sentsoftcovid/") ? 'https://localhost/' : 'https://sentsoft.net/'; ?>sentsoft/empresas/bienvenida_empresa">
            <img  class="logo2" src="<?php echo $Router; ?>img/logo1.png" width="120">
        </a>
        <?php
        $username = strlen($this->Session->read('Auth.User.username')) > 26 ? (substr($this->Session->read('Auth.User.username'), 0, 26)) . ' ...' : (substr($this->Session->read('Auth.User.username'), 0, 27));
        ?>
        <div align="center" id="menu_username"><span style="color:white;font-size: 14px"><?php echo $username; ?></span></div>
    </div>
    <div class="sidebar-wrapper ps-container ps-theme-default ps-active-x" data-ps-id="b5f53adf-172b-980d-6072-2e26056acd90">
        <ul class="nav">
            <?php foreach ($menu_items["Menu"] as $key => $value) { ?>
                <li class="<?php echo ($this->Session->read('Auth.User.Menu.MenuSelect') == $value["Menu"]["id"]) ? 'active' : ''; ?>">
                    <a data-toggle="collapse" href="<?php echo $value["Menu"]["href"]; ?>" aria-expanded="true">
                        <i class="<?php echo $value["Menu"]["icon"]; ?>"></i>
                        <p>
                            <?php echo $value["Menu"]["menu_principal"]; ?>
                            <b class="caret"></b>
                        </p>
                    </a>
                    <?php if ($value["SubMenu"] != null) { ?>
                        <div class="collapse <?php echo ($this->Session->read('Auth.User.Menu.MenuSelect') == $value["Menu"]["id"]) ? 'show' : ''; ?>" id="<?php echo str_replace("#", "", $value["Menu"]["href"]); ?>">
                            <ul class="nav">
                                <?php foreach ($value["SubMenu"] as $key2 => $value2) { ?>
                                    <li class="<?php echo ($this->Session->read('Auth.User.Menu.SubMenu') == $value2["id"]) ? 'active' : ''; ?>">
                                        <a onclick="menuclick(<?php echo $value['Menu']['id']; ?>,<?php echo $value2['id']; ?>,'<?php echo $Router; ?><?php echo $value2["controller"] ?>/<?php echo $value2["function"] ?>')" href="#">
                                            <i class="fa <?php echo $value2["mini-icon"]; ?>" aria-hidden="true"></i>
                                            <span class="sidebar-normal"> <?php echo $value2["submenu"]; ?> </span>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>
                </li>
            <?php } ?>
        </ul>
        <div class="ps-scrollbar-x-rail" style="width: 260px; left: 0px; bottom: 0px;">
            <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 258px;"></div>

        </div>
        <div class="ps-scrollbar-y-rail" style="top: 0px; right: 0px;">
            <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div>
        </div>
    </div>
</div>