import styled from 'styled-components';

export const Button = styled.button`
    display: inline-block;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    text-align: center;
    text-decoration: none;
    vertical-align: middle;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
    background-color: transparent;
    border: 1px solid transparent;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    border-radius: 0.25rem;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
`;

export const ButtonSuccess = styled(Button)`
    color: #fff;
    background-color: #198754;
    border-color: #198754;

    &:hover {
        color: #fff;
        background-color: #157347;
        border-color: #146c43;
    }
`;