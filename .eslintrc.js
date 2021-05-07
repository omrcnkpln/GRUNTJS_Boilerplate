module.exports = {
  extends: [
    'airbnb-base',
  ],
  parserOptions: {
    ecmaVersion: 2020,
    sourceType: 'module',
  },
  env: {
    browser: true,
    es2021: true,
    node: true,
    jquery: true,
    jest: true,
  },
  rules: {
    "max-len": 1,
    "eqeqeq": 1,
    "no-plusplus": 1
  },
};
