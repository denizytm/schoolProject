<div class="bottom-right-search-container">
    <div class="inner-top-right-container">
        <form class="inner-right" action="/search?searchData=<?php echo $searchData ?>&page=1" method="POST" >
            <label class="label" for="by-publisher-container"> <h2>By Publisher</h2> </label>
            <div class="input-container">
                <input type="hidden" name="radioDate" value="<?php echo $dateFilter ?>" >
                <input type="hidden" name="checkboxType" value="<?php echo $typeFilter ?>" >
                <input type="hidden" name="checkboxLanguage" value="<?php echo $languageFilter ?>" >
                <input type="hidden" name="page" value="1" >
                <input 
                    name="searchData"
                    class="by-publisher-container"
                    type="text" 
                    placeholder="Filtered Search" 
                    value="<?php if(isset($searchData)) echo $searchData; ?>" 
                />   
                <button class="submit" >Search<div class="circle"></div></button> 
            </div>
        </form>
    </div>
    <div class='inner-bottom-right-container'>
        <ul class='data-list-container' >
            <?php
                $lastIndex = 0;
                if ($datas == null || count($datas) == 0) {
                    // echo "bos";
                } else {
                    $start = ($pageData - 1) * 5;
                    $end = min($start + 5, count($datas)); 
                    for ($i = $start; $i < $end; $i++) {
                        $lastIndex = $i;
      
                        $element = $datas[$i];
                        if($element == "") {

                        } else {
                            if($element["type"] == "Lesson") {
                            $type = $element["type"];
                            $name = $element["name"];
                            $language = $element["language"];
                            $date = $element["date"];
                            $promotion = $element["promotion"];
                            $tags = explode("-",$element["tags"]);
                            ?>
                            <li class='data-container' >
                                <img class='image' src=' <?php echo publicImage("study.png") ?> ' alt='image'>
                                <div class='text-container'>
                                    <div class='inner-text-container'>
                                        <h2 class='title' >
                                            <?php echo $name; ?>
                                        </h2>
                                        <h5 class='type'><?php echo $type ?></h5>
                                        <p class='list-text'><?php echo $promotion ?></p>
                                    </div>
                                    <ul class='tag-list-container' >
                                        <?php foreach($tags as $tag): ?>
                                            <li class='tag' ><a href='/search?searchData=<?php echo $tag ?>&page=1'><?php echo $tag ?><div class='circle'></div> </a></li>
                                        <?php endforeach?>
                                    </ul>
                                    <div class='button'>
                                        <a href='/study?title=<?php echo $tag ?>&page=1'>Read</a>
                                    </div>
                                </div>
                            </li>
            <?php   
            }else { ?>
                <li class="question">
                <div class="image-container">
                    <img class="image" src="<?php
                        if($element['userImage'] != null) {
                            echo $element['userImage'];
                        } else {
                            echo "./views/assets/person.png";
                        }

                        ?>" alt="">
                </div>
                <div class="text-container">
                    <div class="top-side">
                        <h3>
                            <a href="/questions?id=<?php echo $element['questionID'];?>" ><?php echo $element['title']; ?></a>
                        </h3>
                        <a class="user-profile-link" href="#">
                            <h5><?php echo $element['username']; ?></h5>
                        </a>
                        <a class="question-text" href="/questions?id=<?php echo $element['questionID'];?>" ><?php echo $element['content']; ?></a>
                    </div>
                    <div class="tags" >
                        <ul>
                            <?php 
                            $tags = explode("-",$element["tags"]);
                            foreach($tags as $tag) : ?>
                            <li>
                                <a href="#"><?php echo $tag; ?></a>
                            </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <div class="bot-side">
                        <div class="details-container">
                            <ul>
                                <li class="left-bot-li"><?php echo $element['views']; ?> views</li>
                                <li class="left-bot-li"i><?php echo $element['answers']; ?> answers</li>
                                <li class="right-bot-li"><?php echo $element['date']; ?></li>
                            </ul>
                        </div>
                        <div class="button">
                            <a href="/questions?id=<?php echo $element['questionID']; ?>" >See</a>
                        </div>
                    </div>
                </div>
            </li>
            <?php }}}}?>
        </ul>
        <div class="prev-next-container">
            <?php if($pageData != 1) : ?>
                <?php if(isset($dateFilter) || isset($typeFilter) || isset($languageFilter) ) : ?>
                    <form action="/search?searchData=<?php echo $searchData ?>&page=<?php echo $pageData - 1 ?>" method="POST" >
                        <input type="hidden" name="radioDate" value="<?php echo $dateFilter ?>" >
                        <input type="hidden" name="checkboxType" value="<?php echo $typeFilter ?>" >
                        <input type="hidden" name="checkboxLanguage" value="<?php echo $languageFilter ?>" >
                        <button type="submit" >Prew</button>
                    </form>
                <?php else : ?>
                <a href='/search?searchData=<?php echo $searchData ?>&page=<?php echo $pageData -1 ?>' >prew</a>
                <?php endif ?>
            <?php endif ?>
            <?php if(count($datas) != ($lastIndex+1) && $lastIndex != 0) : ?> 
                <?php if(isset($dateFilter) || isset($typeFilter) || isset($languageFilter) ) : ?>
                    <form action="/search?searchData=<?php echo $searchData ?>&page=<?php echo $pageData + 1 ?>" method="POST" >
                        <input type="hidden" name="radioDate" value="<?php echo $dateFilter ?>" >
                        <input type="hidden" name="checkboxType" value="<?php echo $typeFilter ?>" >
                        <input type="hidden" name="checkboxLanguage" value="<?php echo $languageFilter ?>" >
                        <button type="submit" >Next</button>
                    </form>
                <?php else : ?>
                <a href='/search?searchData=<?php echo $searchData ?>&page=<?php echo $pageData + 1 ?>' >next</a>
                <?php endif ?>
            <?php endif ?>
        </div>
    </div>
</div>