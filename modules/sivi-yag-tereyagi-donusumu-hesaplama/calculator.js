function hcYagDonustur() {
    const amount = parseFloat(document.getElementById('hc-obc-amount').value);
    const mode = document.getElementById('hc-obc-from').value;

    if (!amount || amount <= 0) return;

    let result = 0;
    let unit = "";
    let note = "";

    if (mode === "butter_to_oil") {
        result = amount * 0.75; // 100g butter -> 75ml oil
        unit = " ml";
        note = "Tereyağı yerine sıvı yağ kullanırken genellikle 4'te 3 oranında kullanılması önerilir.";
    } else {
        result = amount * 1.33; // 100ml oil -> 133g butter
        unit = " g";
        note = "Sıvı yağ yerine tereyağı kullanırken miktar yaklaşık %33 artırılır.";
    }

    const resultDiv = document.getElementById('hc-oil-butter-conv-result');
    document.getElementById('hc-obc-res-val').innerText = Math.round(result).toLocaleString('tr-TR') + unit;
    document.getElementById('hc-obc-note').innerText = note;
    
    resultDiv.classList.add('visible');
}
