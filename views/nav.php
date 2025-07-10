<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
<?php
    // Gebruik taal uit de pagina of val terug op de sessie
    $current_lang = $current_lang ?? ($_SESSION['lang'] ?? 'en');
    $flags = [
        'en' => ['img' => 'en.png', 'alt' => 'British flag'],
        'nl' => ['img' => 'nl.png', 'alt' => 'Dutch flag'],
        'de' => ['img' => 'de.png', 'alt' => 'German flag'],
    ];
?>
    <div class="container-fluid px-4 px-lg-5">
        <a class="navbar-brand" href="https://modops.nl">ModOps.nl</a>
        <div class="d-flex align-items-center d-lg-none ms-auto">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="dropdown ms-2">
                <a class="nav-link dropdown-toggle" href="#" id="mobileLangDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="flagico" src="img/ico/<?=$flags[$current_lang]['img'];?>" alt="<?=$flags[$current_lang]['alt']; ?>">
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="mobileLangDropdown">
                    <?php foreach ($flags as $lang_code => $flag_data): ?>
                        <?php if ($lang_code !== $current_lang): ?>
                            <li>
                                <a class="dropdown-item" href="?lang=<?=$lang_code;?>">
                                    <img class="flagico" src="img/ico/<?=$flag_data['img'];?>" alt="<?=$flag_data['alt'];?>">
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto my-2 my-lg-0">
                <li class="nav-item"><a class="nav-link" href="#description"><?=$lang['JOB-DESCRIPTION']?></a></li>
                <li class="nav-item"><a class="nav-link" href="#benefits"><?=$lang['BENEFITS']?></a></li>
                <li class="nav-item"><a class="nav-link" href="#nutshell"><?=$lang['NUTSHELL']?></a></li>
                <li class="nav-item"><a class="nav-link" href="#earnings"><?=$lang['EARNINGS']?></a></li>
                <li class="nav-item"><a class="nav-link" href="#apply"><?=$lang['APPLY-NOW']?></a></li>
                <li class="nav-item"><a class="nav-link" href="#faq"><?=$lang['FAQ']?></a></li>
                <li class="nav-item dropdown d-none d-lg-block">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="flagico" src="img/ico/<?=$flags[$current_lang]['img'];?>" alt="<?=$flags[$current_lang]['alt']; ?>">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <?php foreach ($flags as $lang_code => $flag_data): ?>
                            <?php if ($lang_code !== $current_lang): ?>
                                <li>
                                    <a class="dropdown-item" href="?lang=<?=$lang_code;?>">
                                        <img class="flagico" src="img/ico/<?=$flag_data['img'];?>" alt="<?=$flag_data['alt'];?>">
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>