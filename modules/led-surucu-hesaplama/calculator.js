function hcLedDriverHesapla() {
    const vf = parseFloat(document.getElementById('hc-ls-vf').value);
    const ifMa = parseFloat(document.getElementById('hc-ls-if').value);
    const count = parseInt(document.getElementById('hc-ls-count').value);

    if (isNaN(vf) || isNaN(ifMa) || isNaN(count) || count <= 0 || vf <= 0 || ifMa <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const totalV = vf * count;
    const power = (totalV * ifMa) / 1000;
    
    // Suggest a driver with some overhead
    const minPower = power * 1.2; 

    document.getElementById('hc-ls-res-v').innerText = totalV.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' VDC';
    document.getElementById('hc-ls-res-i').innerText = ifMa.toLocaleString('tr-TR') + ' mA';
    document.getElementById('hc-ls-res-p').innerText = Math.ceil(minPower) + ' Watt';
    
    document.getElementById('hc-ls-result').classList.add('visible');
}
