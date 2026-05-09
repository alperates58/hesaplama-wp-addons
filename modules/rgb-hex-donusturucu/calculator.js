function hcRgbToHex() {
    const r = parseInt(document.getElementById('hc-rhd-r').value);
    const g = parseInt(document.getElementById('hc-rhd-g').value);
    const b = parseInt(document.getElementById('hc-rhd-b').value);
    const resultDiv = document.getElementById('hc-rgb-hex-donusturucu-result');
    const preview = document.getElementById('hc-rhd-preview');
    const output = document.getElementById('hc-rhd-output');

    if (!isNaN(r) && !isNaN(g) && !isNaN(b) && r >= 0 && r <= 255 && g >= 0 && g <= 255 && b >= 0 && b <= 255) {
        const toHex = (c) => {
            const hex = c.toString(16).toUpperCase();
            return hex.length === 1 ? '0' + hex : hex;
        };
        const hex = `#${toHex(r)}${toHex(g)}${toHex(b)}`;
        
        preview.style.backgroundColor = hex;
        output.innerHTML = `<div class="hc-result-value">${hex}</div>`;
        resultDiv.classList.add('visible');
    } else {
        resultDiv.classList.remove('visible');
    }
}
