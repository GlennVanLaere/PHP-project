<div class="btnGroup">
    <a href="chat.php?messageid=<?php echo $person->getBuddyId(); ?>" class="btn btn-success">Open chat<?php if ($person->messageSenders($person->getUserId(), $person->getBuddyId())) { echo " 🔔";}?></a>
    <?php if ($person->hasBuddy($person->getBuddyId())): ?>
    <a href="#" id="btnRemoveBuddy" data-buddy="<?php echo $person->getBuddyId(); ?>" class="btn btn-danger">Remove buddy</a>
    <?php elseif ($person->sentRequest($userId, $person->getBuddyId())): ?>
    <a href="#"  id="btnCancelRequest" class="btn btn-danger">Cancel Request</a>
    <?php elseif ($person->receivedRequest($userId, $person->getBuddyId())): ?>
    <a href="#" id="btnIgnoreRequest" data-buddy="<?php echo $person->getBuddyId(); ?>" class="btn btn-danger">Ignore</a>
    <a href="#" id="btnAcceptRequest" data-buddy="<?php echo $person->getBuddyId(); ?>" class="btn btn-info">Accept</a>
    <textarea id="textIgnoreRequest" class="form-control" rows="4" placeholder="Reason"></textarea>
    <?php else: ?>
    <a href="#" id="btnSendRequest" data-buddy="<?php echo $person->getBuddyId(); ?>" class="btn btn-danger">Send Request</a>
    <?php if ($person->isReasonSet($person->getBuddyId())): ?>
    <p>Reason:</p>
    <p><?php echo $person->getReason(); ?></p>
    <?php endif; ?>
    <?php endif; ?>
</div>