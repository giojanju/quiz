import React from 'react'
import { Menu } from 'antd';
import { withRouter } from "react-router-dom";

const Header = ({ history }) => {
    return (
        <div>
            <div className="logo" />
            <Menu
                theme="light"
                mode="horizontal"
                defaultSelectedKeys={['1']}
                style={{ lineHeight: '64px' }}
            >
                <Menu.Item onClick={() => history.push('/')} key="1">Main</Menu.Item>
            </Menu>
        </div>
    )
};

export default withRouter(Header)
