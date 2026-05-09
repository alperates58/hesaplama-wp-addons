function hcServerCapHesapla() {
    const totalReq = parseFloat(document.getElementById('hc-sc-req').value) || 0;
    const capPerServer = parseFloat(document.getElementById('hc-sc-cap').value) || 1;
    const sf = parseFloat(document.getElementById('hc-sc-sf').value) || 1;

    const serverCount = Math.ceil((totalReq / capPerServer) * sf);

    document.getElementById('hc-res-sc-val').innerText = serverCount.toLocaleString('tr-TR') + ' Sunucu';
    document.getElementById('hc-server-cap-result').classList.add('visible');
}
