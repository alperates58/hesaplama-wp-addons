function hcBaharatDonustur() {
    const amount = parseFloat(document.getElementById('hc-hc-amount').value);
    const mode = document.getElementById('hc-hc-from').value;

    if (!amount || amount <= 0) return;

    let result = 0;
    if (mode === "fresh_to_dried") {
        result = amount / 3;
    } else {
        result = amount * 3;
    }

    const resultDiv = document.getElementById('hc-herb-conv-result');
    document.getElementById('hc-hc-res-val').innerText = result.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + " Birim";
    
    resultDiv.classList.add('visible');
}
