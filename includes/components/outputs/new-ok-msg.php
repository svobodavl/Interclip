<p><span id="url" class="url"><?php echo $url ?> </span><br><br> was saved as</p>
<h1 class="usrCode"><?php echo $usr ?></h1>
<div id="embed"> </div>
<div id="qrcode"></div>

<script type="module">
    /* MIT  Copyright (c) Feross Aboukhadijeh */
    function colorSchemeChange (onChange) {
        const media = window.matchMedia('(prefers-color-scheme: dark)')

        handleChange()

        if ('addEventListener' in media) {
            media.addEventListener('change', handleChange)
        } else if ('addListener' in media) {
            media.addListener(handleChange)
        }

        function handleChange () {
            const scheme = media.matches
            ? 'dark'
            : 'light'
            onChange(scheme)
        }
    }
    /* End of copyrighted code, code from https://github.com/feross/color-scheme-change */

    const style = window
        .getComputedStyle(document.documentElement)
        .getPropertyValue('content')
        .replace(/"/g, '')

    let options;

    if (style == "" || style == "light") {
        options = {
            text: "https://iclip.netlify.com/r/<?php echo $usr ?>",
            background: "#ff9800",
            foreground: "#000000",
        }
    } else if (style == "dark") {
        options = {
            text: "https://iclip.netlify.com/r/<?php echo $usr ?>",
            background: "#444444",
            foreground: "#e4e4e4",
        }
    }
    $('#qrcode').qrcode(options);

    colorSchemeChange(colorScheme => {
        options = {
            text: "https://iclip.netlify.com/r/<?php echo $usr ?>",
            background: colorScheme === 'dark' ? "#444444" : "#ff9800",
            foreground: colorScheme === 'dark' ? "#e4e4e4" : "#000000",
        }
        $('#qrcode').html("");
        $('#qrcode').qrcode(options);

        // Prints either "Entering dark mode" or "Entering light mode"
    })

</script>