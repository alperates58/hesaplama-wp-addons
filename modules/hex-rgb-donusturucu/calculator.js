function hcHexToRgb() {
    let hex = document.getElementById('hc-hrd-hex').value.replace('#', '');
    const resultDiv = document.getElementById('hc-hex-rgb-donusturucu-result');
    const preview = document.getElementById('hc-hrd-preview');
    const output = document.getElementById('hc-hrd-output');

    if (hex.length === 3) {
        hex = hex.split('').map(char => char + char).join('');
    }

    if (hex.length === 6) {
        const r = parseInt(hex.substring(0, 2), 16);
        const g = parseInt(hex.substring(2, 4), 16);
        const b = parseInt(hex.substring(4, 6), 16);

        if (!isNaN(r) && !isNaN(g) && !isNaN(b)) {
            preview.style.backgroundColor = `#${hex}`;
            output.innerHTML = `
                <div class="hc-result-value">rgb(${r}, ${g}, ${b})</div>
                <div style="margin-top:10px; font-size:14px; color:#667085;">
                    R: ${r}<br>
                    G: ${g}<br>
                    B: ${b}
                </div>
            `;
            resultDiv.classList.add('visible');
            return;
        }
    }
    resultDiv.classList.remove('visible');
}
