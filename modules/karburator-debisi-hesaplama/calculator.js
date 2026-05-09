function hcCfmHesapla() {
    const cid = parseFloat(document.getElementById('hc-cfm-cid').value);
    const rpm = parseFloat(document.getElementById('hc-cfm-rpm').value);
    const ve = parseFloat(document.getElementById('hc-cfm-ve').value) / 100;

    if (isNaN(cid) || isNaN(rpm) || isNaN(ve)) {
        alert('Lütfen tüm değerleri girin.');
        return;
    }

    // Formula: (CID * RPM * VE) / 3456
    const cfm = (cid * rpm * ve) / 3456;

    document.getElementById('hc-cfm-val').innerText = Math.round(cfm) + " CFM";
    document.getElementById('hc-cfm-result').classList.add('visible');
}
