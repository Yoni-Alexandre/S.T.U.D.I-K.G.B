<?php global$pageCourante, $nbPages; ?>
<!-- PAGINATION -->
<div class="row">
    <div class="col-12">
        <nav aria-label="Pagination">
            <ul class="pagination justify-content-center">
                <li class="page-item <?php if ($pageCourante == 1) { echo "disabled"; } ?>">
                    <a class="page-link" href="../../index.php?uc=specialite&action=liste&page=<?php echo $pageCourante - 1; ?>" tabindex="-1" aria-disabled="true">Précédent</a>
                </li>
                <?php for ($i = 1; $i <= $nbPages; $i++) { ?>
                    <li class="page-item <?php if ($pageCourante == $i) { echo "active"; } ?>">
                        <a class="page-link" href="../../index.php?uc=specialite&action=liste&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php } ?>
                <li class="page-item <?php if ($pageCourante == $nbPages) { echo "disabled"; } ?>">
                    <a class="page-link" href="../../index.php?uc=specialite&action=liste&page=<?php echo $pageCourante + 1; ?>">Suivant</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- PAGINATION -->