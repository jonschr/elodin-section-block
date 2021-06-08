## 1.3.0
* Improving the logic for padding a bit to try to not output bad CSS but to also consistently work even with 0 values
* Looking through the code for other zero-value issues
* Adding in code to allow for better synching of ACF fields

## 1.2.0
* Adding the fields for syncing

## 1.1.4
* Zero value was being treated as empty for mobile min height, allowing junk code to output temporarily (duct tape solution)

## 1.1.3
* Bugfix: whoops, was outputting test code

### 1.1.2
* Bugfix: some useless css was outputting because a check was finding that variables were set, even through they were empty. We now check for empty variables instead

### 1.1.1
* Bugfix: moving the order that things are loaded so that ACF is available whether installed or not

### 1.1.0
* Adding ACF to the plugin

### 1.0.9
* Adding min-height property for mobile only
* Adding background texture capability

### 1.0.8
* BUGFIX: pushing a fix for when values are zero (whoops)!

### 1.0.7
* BUGFIX: pushing a fix for some sites which were getting an accidentally grayscaled background when an update was pushed after the site was already set up.

### 1.0.6
* Add background saturation setting

### 1.0.5
* Fixing php notice for an undefined variable, already present but not being used in the current release

### 1.0.4 
* Adding dashed lines on the backend to add clarity as blocks are being moved/edited

### 1.0.3
* BUGFIX: bail on getting the colors if the theme doesn't declare any

### 1.0.1
* Updating how we load fields to remove the json sync (seems easy to run into conflicts), just loading from php instead.
* Minor fixes to a few fields with bad defaults.

### 1.0
* Initial commit