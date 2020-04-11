<a href="chat.php?messageid=<?php echo $person->getBuddyId(); ?>" class="btn btn-success">Open chat</a>
<?php if ($person->hasBuddy($person->getBuddyId())): ?>
<a href="#" id="btnRemoveBuddy" data-buddy="<?php echo $person->getBuddyId(); ?>" class="btn btn-danger">Remove buddy</a>
<?php elseif ($person->sentRequest($userId, $person->getBuddyId())): ?>
<a href="#"  id="btnCancelRequest" class="btn btn-danger">Cancel Request</a>
<?php elseif ($person->receivedRequest($userId, $person->getBuddyId())): ?>
<a href="#" class="btn btn-danger">Ignore</a>
<a href="#" class="btn btn-info">Accept</a>
<?php else: ?>
<a href="#" id="btnSendRequest" data-buddy="<?php echo $person->getBuddyId(); ?>" class="btn btn-danger">Send Request</a>
<?php endif; ?>