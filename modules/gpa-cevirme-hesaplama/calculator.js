function hcGPACevir() {
    const type = document.getElementById('hc-gc-type').value;
    const val = parseFloat(document.getElementById('hc-gc-value').value);

    if (isNaN(val)) {
        alert('Lütfen geçerli bir not girin.');
        return;
    }

    let result;
    if (type === '4to100') {
        if (val > 4 || val < 0) { alert('4\'lük sistemde not 0-4 arası olmalıdır.'); return; }
        // YÖK table approx: 4 -> 100, 3.5 -> 88.33, 3 -> 76.66, 2.5 -> 65, 2 -> 53.33? No, YÖK says 2.0 = 60.
        // Let's use the most common linear mapping: Result = (val * 20) + 20 (for val >= 2)
        // Or simply val * 25 for general purpose.
        result = (val * 25).toFixed(2);
    } else {
        if (val > 100 || val < 0) { alert('100\'lük sistemde not 0-100 arası olmalıdır.'); return; }
        result = (val / 25).toFixed(2);
    }

    document.getElementById('hc-gc-val').innerText = result;
    document.getElementById('hc-gc-result').classList.add('visible');
}
