<?php
$this->assign('title', 'New Contract Wizard');
?>
<h1>New Contract</h1>
<p>The first step to starting the Mental Bank is creating your contract. Your contract is how much you're agreeing with your subconscious mind to earn per year.</p>
<p>Your first contract is based on your current income. We will simply take your current income, and double it, to reach the contract amount. This tends to be most believable to your subconscious mind.</p>
<p>Please enter your current income below to continue.</p>
<?php
echo $this->Form->create($wizard);
echo $this->Form->control('income');
echo $this->Form->submit('Next >');
echo $this->Form->end();
