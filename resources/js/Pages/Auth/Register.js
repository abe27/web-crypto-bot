import React, { useEffect, useState } from 'react'
import { Guest } from '@/Layouts'
import { Header, ValidationErrors } from '@/Components'
import { useForm } from '@inertiajs/inertia-react'
import {
  FormControl,
  FormLabel,
  Input,
  InputGroup,
  InputRightElement,
  Stack,
  Button,
  Link,
} from '@chakra-ui/react'
import { ViewIcon, ViewOffIcon } from '@chakra-ui/icons'

const Register = () => {
  const { data, setData, post, processing, errors, reset } = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
  })

  const [showPassword, setShowPassword] = useState(false)

  useEffect(() => {
    return () => {
      reset('password', 'password_confirmation')
    }
  }, [])

  const onHandleChange = (event) => {
    setData(
      event.target.name,
      event.target.type === 'checkbox'
        ? event.target.checked
        : event.target.value,
    )
  }

  const submit = (e) => {
    e.preventDefault()

    post(route('register'))
  }

  return (
    <Guest>
      <Header
        title="ลงทะเบียนบัญชีผู้ใช้งาน"
        description="ลงทะเบียนกับระบบช่วยเทรด"
      />

      <ValidationErrors errors={errors} />

      <form onSubmit={submit}>
        <Stack spacing={8} marginBottom={4}>
          <FormControl id="name">
            <FormLabel>นามแฝง</FormLabel>
            <Input
              type="text"
              name="name"
              value={data.name}
              onChange={onHandleChange}
              placeholder="นามแฝง"
            />
          </FormControl>
        </Stack>
        <Stack marginBottom={4}>
          <FormControl id="email">
            <FormLabel>ที่อยู่อีเมล์</FormLabel>
            <Input
              type="email"
              name="email"
              value={data.email}
              onChange={onHandleChange}
              placeholder="ที่อยู่อีเมล์"
            />
          </FormControl>
        </Stack>
        <Stack marginBottom={4}>
          <FormControl id="password">
            <FormLabel>รหัสผ่าน</FormLabel>
            <InputGroup>
              <Input
                type={showPassword ? 'text' : 'password'}
                name="password"
                value={data.password}
                onChange={onHandleChange}
                placeholder="รหัสผ่าน"
              />
              <InputRightElement h={'full'}>
                <Button
                  variant={'ghost'}
                  onClick={() =>
                    setShowPassword((showPassword) => !showPassword)
                  }
                >
                  {showPassword ? <ViewIcon /> : <ViewOffIcon />}
                </Button>
              </InputRightElement>
            </InputGroup>
          </FormControl>
        </Stack>
        <Stack marginBottom={4}>
          <FormControl id="password">
            <FormLabel>รหัสผ่าน</FormLabel>
            <InputGroup>
              <Input
                type={showPassword ? 'text' : 'password'}
                name="password_confirmation"
                value={data.password_confirmation}
                onChange={onHandleChange}
                placeholder="ยืนยันรหัสผ่าน"
              />
              <InputRightElement h={'full'}>
                <Button
                  variant={'ghost'}
                  onClick={() =>
                    setShowPassword((showPassword) => !showPassword)
                  }
                >
                  {showPassword ? <ViewIcon /> : <ViewOffIcon />}
                </Button>
              </InputRightElement>
            </InputGroup>
          </FormControl>
        </Stack>
        <Stack marginTop={8} spacing={8}>
          <Button
            isLoading={processing}
            colorScheme={'purple'}
            variant={'solid'}
            type="submit"
          >
            เข้าสู่ระบบ
          </Button>
          <Stack align={'center'}>
            <Link href={route('login')} color={'blue.500'}>
              มีบัญชีผู้ใช้งานแล้ว
            </Link>
          </Stack>
        </Stack>
      </form>
    </Guest>
  )
}

export default Register
