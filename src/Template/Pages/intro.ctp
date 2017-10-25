<?php
$this->assign('title', 'Home');
?>
<h1>Welcome to Mental Bank</h1>

<p>The Mental Bank is the most effective way of communicating with your subconscious mind to effect change and achieve your goals in life.</p>

<p>By writing in the Mental Bank daily, you can quickly overcome your subconscious resistance to your goals, and find the quickest way to achieve them.</p>

<p>The Mental Bank is taught by the Hypnosis Motivation Institute. This app is not associated with HMI, and we cannot teach the Mental Bank subject. To learn how the Mental Bank works, please see this video:</p>

<iframe width="560" height="315" src="https://www.youtube.com/embed/JCsX6CeRJNY" frameborder="0" allowfullscreen></iframe>

<p>HMI recommends writing out the Mental Bank in longhand script, but for those who cannot, such as visually impaired users, or those who just prefer to use an online tool, this app has been developed.</p>

<p>To get started with the Mental Bank, please <?= $this->Html->link('log in', ['plugin' => 'CakeDC/Users', 'controller' => 'Users', 'action' => 'login']) ?> or <?= $this->Html->link('register', ['plugin' => 'CakeDC/Users', 'controller' => 'Users', 'action' => 'register']) ?>, or read the help section to learn more about how to use it.</p>
