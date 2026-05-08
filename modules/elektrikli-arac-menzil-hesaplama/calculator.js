function hcEvmHesapla() {
    const capacity = parseFloat(document.getElementById('hc-evm-capacity').value);
    const charge = parseFloat(document.getElementById('hc-evm-charge').value);
    const cons = parseFloat(document.getElementById('hc-evm-cons').value);

    if (isNaN(capacity) || isNaN(cons) || cons === 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const availableEnergy = capacity * (charge / 100);
    const range = (availableEnergy / cons) * 100;

    document.getElementById('hc-evm-val').innerText = Math.round(range) + " km";
    document.getElementById('hc-evm-result').classList.add('visible');
}
