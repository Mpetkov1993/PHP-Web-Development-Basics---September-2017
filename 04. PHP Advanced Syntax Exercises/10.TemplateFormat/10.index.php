<?php
$xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<quiz>{template}
</quiz>
";
$template = "
  <question>
    {question text}
  </question>
  <answer>
    {answer text}
  </answer>";
$text = "";
$input = explode(", ", trim(fgets(STDIN)));
for ($i = 0; $i < count($input); $i+=2) {
    $question = $input[$i];
    $answer = $input[$i+1];
    $q = str_replace("{question text}", $question, $template);
    $a = str_replace("{answer text}", $answer, $q);
    $text .= $a;
}
$result = str_replace("{template}", $text, $xml);
echo $result;